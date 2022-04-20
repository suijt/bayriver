<?php

namespace App\Modules\Services\SubCategory;

use App\Modules\Models\SubCategory\SubCategory;


use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class SubCategoryService extends Service
{
    protected $subCategory;
    protected $category;


    public function __construct(
        SubCategory $subCategory

    ) {
        $this->subCategory = $subCategory;
    }


    /*For DataTable*/
    public function getAllData($categoryId)
    {

        $query = SubCategory::where('category_id', '=', $categoryId)->get();
        $user = Auth::user();

        $datas = DataTables::of($query)
            ->addIndexColumn()

            ->editColumn('name', function (SubCategory $subcategory) {
                return getTableHtml($subcategory, 'name');
            })
            ->editColumn('visibility', function (SubCategory $subcategory) {
                return getTableHtml($subcategory, 'visibility');
            })
            ->editColumn('availability', function (SubCategory $subcategory) {
                return getTableHtml($subcategory, 'availability');
            })
            ->editColumn('status', function (SubCategory $subcategory) {
                return getTableHtml($subcategory, 'status');
            })
            ->editColumn('actions', function (SubCategory $subcategory)  use ($user) {
                $editRoute = ($user->can('edit category')) ?  route('category.subcategory.edit', [$subcategory->category->slug, $subcategory->id]) : '';
                $deleteRoute = ($user->can('delete category')) ?  route('category.subcategory.destroy', [$subcategory->category->slug, $subcategory->id]) : '';
                $uploadRoute = true;
                $optionRoute = '';
                $optionRouteText = '';

                return getTableHtml($subcategory, 'actions', $editRoute, $deleteRoute, $optionRoute, $optionRouteText, $uploadRoute);
            })->rawColumns(['image', 'visibility', 'availability', 'has_groups', 'input_type', 'status', 'created_by', 'actions'])
            ->make(true);


        return $datas;
    }


    public function create(array $data, $categoryId)
    {
        try {
            $data['visibility'] = (isset($data['visibility']) ? $data['visibility'] : '') == 'on' ? 'visible' : 'invisible';
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['availability'] = (isset($data['availability']) ? $data['availability'] : '') == 'on' ? 'available' : 'not_available';
            $data['has_groups'] = (isset($data['has_groups']) ? $data['has_groups'] : '') == 'on' ? 'yes' : 'no';
            $data['created_by'] = Auth::user()->id;
            $data['category_id'] = $categoryId;
            $subcategory = $this->subCategory->create($data);
            return $subcategory;
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
        return $this->categosubCategoryry->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    public function getAllByCategory($categoryId, array $filter = [])
    {
        $filter['limit'] = 25;

        return $this->subCategory->whereCategoryId($categoryId)->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->subCategory->all();
    }

    /**
     * Get all users with supervisor type
     *
     * @return Collection
     */


    public function find($subCategoryId)
    {
        try {
            return $this->subCategory->find($subCategoryId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($subCategoryId, array $data, $categoryId)
    {
        try {
            //
            $data['visibility'] = (isset($data['visibility']) ? $data['visibility'] : '') == 'on' ? 'visible' : 'invisible';
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['availability'] = (isset($data['availability']) ? $data['availability'] : '') == 'on' ? 'available' : 'not_available';
            $data['has_groups'] = (isset($data['has_groups']) ? $data['has_groups'] : '') == 'on' ? 'yes' : 'no';
            $data['category_id'] = $categoryId;
            $data['last_updated_by'] = Auth::user()->id;
            //            dd($data);
            $subCategory = $this->subCategory->find($subCategoryId);
            $subCategory = $subCategory->update($data);

            return $subCategory;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }


    public function updateImage($subCategoryId, array $data)
    {
        try {

            $subCategory = $this->subCategory->find($subCategoryId);
            $subCategory = $subCategory->update($data);

            return $subCategory;
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
    public function delete($subCategoryId)
    {
        try {
            $subcategory = $this->subCategory->find($subCategoryId);
            $data['is_deleted'] = 'yes';
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            return $category = $subcategory->update($data);;
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
        return $this->subCategory->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->subCategory->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'tenancy/assets/uploads/subcategory';
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
}
