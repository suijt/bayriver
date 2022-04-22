<?php

namespace App\Modules\Services\Category;

use App\Modules\Models\Category\Category;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class CategoryService extends Service
{
    protected $category;

    public function __construct(
        Category $category
    ) {
        $this->category = $category;
    }


    /*For DataTable*/
    public function getAllData($type)
    {
        $user = Auth::user();
        $query = $this->category->whereType($type)->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('status', function (Category $category) {
                return getTableHtml($category, 'status');
            })
            ->editColumn('actions', function (Category $category) {
                $editRoute = route('admin.category.edit', [$category->id, $category->type]);
                $deleteRoute = route('admin.category.destroy', [$category->id, $category->type]);
                $optionRouteText = '';
                $optionRoute = '';
                // if ($category->has_subcategory == 'yes') {
                //     $optionRoute = route('admin.category.subcategory.index', $category->slug);
                //     $optionRouteText = 'Manage Sub Category';
                // }
                return getTableHtml($category, 'actions', $editRoute, $deleteRoute, '', $optionRoute, '');
            })->rawColumns(['image', 'availability', 'has_subcategory', 'status', 'created_by', 'actions', 'color', 'order'])
            ->make(true);
    }

    public function create(array $data, $type)
    {
        try {
            /* $data['keywords'] = '"'.$data['keywords'].'"';*/
            $data['visibility'] = (isset($data['visibility']) ?  $data['visibility'] : '') == 'on' ? 'visible' : 'invisible';
            $data['status'] = (isset($data['status']) ?  $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['availability'] = (isset($data['availability']) ?  $data['availability'] : '') == 'on' ? 'available' : 'not_available';
            $data['has_subcategory'] = (isset($data['has_subcategory']) ?  $data['has_subcategory'] : '') == 'on' ? 'yes' : 'no';
            $data['created_by'] = Auth::user()->id;
            $data['type'] = $type;
            //dd($data);
            $category = $this->category->create($data);
            return $category;
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

        return $this->category->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->category->get();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function get($status = null, $value = null)
    {
        return $this->category->where($status, $value)->get();
    }

    /**
     * Get all users with supervisor type
     *
     * @return Collection
     */


    public function find($categoryId)
    {
        try {
            return $this->category->find($categoryId);
        } catch (Exception $e) {
            return null;
        }
    }

    public function getByType($type)
    {
        try {
            return $this->category->whereType($type)->get();
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($categoryId, array $data)
    {
        try {
            //            $data['visibility'] = (isset($data['visibility']) ?  $data['visibility'] : '')=='on' ? 'visible' : 'invisible';
            $data['status'] = (isset($data['status']) ?  $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['availability'] = (isset($data['availability']) ?  $data['availability'] : '') == 'on' ? 'available' : 'not_available';
            //            $data['has_subcategory'] = (isset($data['has_subcategory']) ?  $data['has_subcategory'] : '')=='on' ? 'yes' : 'no';
            $data['last_updated_by'] = Auth::user()->id;
            $category = $this->category->find($categoryId);

            $category = $category->update($data);
            //$this->logger->info(' created successfully', $data);

            return $category;
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
    public function delete($categoryId)
    {
        try {

            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $category = $this->category->find($categoryId);
            $data['is_deleted'] = 'yes';
            return $category = $category->update($data);
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
        return $this->category->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->category->whereSlug($slug)->first();
    }


    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'tenancy/assets/uploads/category';
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

    public function updateImage($categoryId, array $data)
    {
        try {
            $category = $this->category->find($categoryId);
            $category = $category->update($data);

            return $category;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
