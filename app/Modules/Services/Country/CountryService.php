<?php

namespace App\Modules\Services\Country;

use App\Modules\Models\Category\Category;
use App\Modules\Models\Country\Country;
use App\Modules\Models\Course\Course;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CountryService extends Service
{
    protected $country;
    protected $course;
    protected $category;

    public function __construct(Country $country, Course $course, Category $category)
    {
        $this->country = $country;
        $this->course = $course;
        $this->category = $category;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->country->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function (Country $country) {
                return getTableHtml($country, 'image');
            })
            ->editColumn('title', function (Country $country) {
                if (!empty($country->title)) {
                    return '<strong>' . $country->title . '</strong>';
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('status', function (Country $country) {
                return getTableHtml($country, 'status');
            })
            ->editColumn('actions', function (Country $country) {
                $editRoute = route('admin.country.edit', $country->id);
                $deleteRoute = route('admin.country.destroy', $country->id);
                return getTableHtml($country, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image', 'status', 'title'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['is_featured'] = (isset($data['is_featured']) ? $data['is_featured'] : '') == 'on' ? 'yes' : 'no';
            $data['created_by'] = Auth::user()->id;
            $country = $this->country->create($data);
            return $country;
        } catch (Exception $e) {
            return null;
        }
    }


    /**
     * Paginate all User
     *
     * @param array $filter
     * @return Collection
     */
    public function paginate(array $filter = [])
    {
        $filter['limit'] = 25;

        return $this->country->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->country->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function get($status = null, $value = null)
    {
        return $this->country->where($status, $value)->get();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->country->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all users with supervisor type
     *all
     * @return Collection
     */


    public function find($countryId)
    {
        try {
            return $this->country->find($countryId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($countryId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['is_featured'] = (isset($data['is_featured']) ? $data['is_featured'] : '') == 'on' ? 'yes' : 'no';
            $data['last_updated_by'] = Auth::user()->id;
            $country = $this->country->find($countryId);
            $country = $country->update($data);
            return $country;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }

    /**
     * Delete a User
     *
     * @param Id
     * @return bool
     */
    public function delete($countryId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $country = $this->country->find($countryId);
            $data['is_deleted'] = 'yes';
            return $country = $country->update($data);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * write brief description
     * @param $name
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->country->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->country->whereSlug($slug)->first();
    }


    public function getInternationalCourses($slug)
    {
        $country = $this->getBySlug($slug);
        // $courseCatID = $this->course->whereCountryId($country->id)->pluck('category_id');
        $courseCatID = $this->course->pluck('category_id');
        $categories = $this->category->whereIn('id', $courseCatID)->get();
        // dd($categories);
        return $categories;
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/country';
            return $fileName = $this->uploadFromAjax($file);
        }
    }

    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);
        } catch (\Exception $e) {
        }
    }

    public function updateImage($countryId, array $data)
    {
        try {

            $country = $this->country->find($countryId);
            $country = $country->update($data);

            return $country;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
