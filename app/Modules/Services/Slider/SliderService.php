<?php

namespace App\Modules\Services\Slider;

use App\Modules\Models\Slider\Slider;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SliderService extends Service
{
    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->slider->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function (Slider $slider) {
                return getTableHtml($slider, 'image');
            })
            ->editColumn('title', function (Slider $slider) {
                if (!empty($slider->title)) {
                    return '<strong>' . $slider->title . '</strong>';
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('status', function (Slider $slider) {
                return getTableHtml($slider, 'status');
            })
            ->editColumn('actions', function (Slider $slider) {
                $editRoute = route('admin.slider.edit', $slider->id);
                $deleteRoute = route('admin.slider.destroy', $slider->id);
                return getTableHtml($slider, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image', 'status', 'title'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['created_by'] = Auth::user()->id;
            $slider = $this->slider->create($data);
            return $slider;
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

        return $this->slider->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->slider->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->slider->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all users with supervisor type
     *all
     * @return Collection
     */


    public function find($sliderId)
    {
        try {
            return $this->slider->find($sliderId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($sliderId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['last_updated_by'] = Auth::user()->id;
            $slider = $this->slider->find($sliderId);
            $slider = $slider->update($data);
            return $slider;
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
    public function delete($sliderId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $slider = $this->slider->find($sliderId);
            $data['is_deleted'] = 'yes';
            return $slider = $slider->update($data);
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
        return $this->slider->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->slider->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/slider';
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

    public function updateImage($sliderId, array $data)
    {
        try {

            $slider = $this->slider->find($sliderId);
            $slider = $slider->update($data);

            return $slider;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
