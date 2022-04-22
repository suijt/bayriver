<?php

namespace App\Modules\Services\Testimonial;

use App\Modules\Models\Testimonial\Testimonial;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TestimonialService extends Service
{
    protected $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->testimonial->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function (Testimonial $testimonial) {
                return getTableHtml($testimonial, 'image');
            })
            ->editColumn('title', function (Testimonial $testimonial) {
                if (!empty($testimonial->title)) {
                    return '<strong>' . $testimonial->title . '</strong>';
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('status', function (Testimonial $testimonial) {
                return getTableHtml($testimonial, 'status');
            })
            ->editColumn('actions', function (Testimonial $testimonial) {
                $editRoute = route('admin.testimonial.edit', $testimonial->id);
                $deleteRoute = route('admin.testimonial.destroy', $testimonial->id);
                return getTableHtml($testimonial, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image', 'status', 'title'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['created_by'] = Auth::user()->id;
            $testimonial = $this->testimonial->create($data);
            return $testimonial;
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

        return $this->testimonial->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->testimonial->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->testimonial->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all users with supervisor type
     *
     * @return Collection
     */


    public function find($testimonialId)
    {
        try {
            return $this->testimonial->find($testimonialId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($testimonialId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['last_updated_by'] = Auth::user()->id;
            $testimonial = $this->testimonial->find($testimonialId);
            $testimonial = $testimonial->update($data);
            return $testimonial;
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
    public function delete($testimonialId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $testimonial = $this->testimonial->find($testimonialId);
            $data['is_deleted'] = 'yes';
            return $testimonial = $testimonial->update($data);
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
        return $this->testimonial->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->testimonial->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/testimonial';
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

    public function updateImage($testimonialId, array $data)
    {
        try {

            $testimonial = $this->testimonial->find($testimonialId);
            $testimonial = $testimonial->update($data);

            return $testimonial;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
