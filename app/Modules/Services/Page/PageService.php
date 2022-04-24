<?php

namespace App\Modules\Services\Page;

use App\Modules\Models\Page\Page;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PageService extends Service
{
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->page->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function (Page $page) {
                return getTableHtml($page, 'image');
            })
            ->editColumn('status', function (Page $page) {
                return getTableHtml($page, 'status');
            })
            ->editColumn('location', function (Page $page) {
                if ($page->quick_links == 'yes') {
                    return "<strong>Quick Link </strong>";
                }
                if ($page->footer_1 == 'yes') {
                    return "<strong>Footer First </strong>";
                }
                if ($page->footer_2 == 'yes') {
                    return "<strong>Footer Second </strong>";
                }
            })
            ->editColumn('actions', function (Page $page) {
                $editRoute = route('admin.page.edit', $page->id);
                $deleteRoute = route('admin.page.destroy', $page->id);
                return getTableHtml($page, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image', 'status', 'location'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'yes' : 'no';
            $data['quick_links'] = (isset($data['quick_links']) ? $data['quick_links'] : '') == 'on' ? 'yes' : 'no';
            $data['footer_1'] = (isset($data['footer_1']) ? $data['footer_1'] : '') == 'on' ? 'yes' : 'no';
            $data['footer_2'] = (isset($data['footer_2']) ? $data['footer_2'] : '') == 'on' ? 'yes' : 'no';
            $data['created_by'] = Auth::user()->id;
            $page = $this->page->create($data);
            return $page;
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

        return $this->page->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->page->all();
    }


    public function find($pageId)
    {
        try {
            return $this->page->find($pageId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function findBySlug($pageSlug)
    {
        try {
            return $this->page->whereSlug($pageSlug)->first();
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($pageId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'yes' : 'no';
            $data['quick_links'] = (isset($data['quick_links']) ? $data['quick_links'] : '') == 'on' ? 'yes' : 'no';
            $data['footer_1'] = (isset($data['footer_1']) ? $data['footer_1'] : '') == 'on' ? 'yes' : 'no';
            $data['footer_2'] = (isset($data['footer_2']) ? $data['footer_2'] : '') == 'on' ? 'yes' : 'no';
            $data['last_updated_by'] = Auth::user()->id;
            $page = $this->page->find($pageId);
            $page = $page->update($data);
            return $page;
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
    public function delete($pageId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $page = $this->page->find($pageId);
            $data['is_deleted'] = 'yes';
            return $page = $page->update($data);
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
        return $this->page->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->page->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/page';
            return $fileName = $this->uploadFromAjax($file);
        }
        if (!empty('banner_image')) {
            $this->uploadPath = 'uploads/page';
            return $this->uploadFromAjax($file);
        }
    }

    public function __deleteImages($page)
    {
        try {
            if (is_file($page->image_path))
                unlink($page->image_path);

            if (is_file($page->thumbnail_path))
                unlink($page->thumbnail_path);
        } catch (\Exception $e) {
        }
    }

    public function updateImage($pageId, array $data)
    {
        try {

            $page = $this->page->find($pageId);
            $page = $page->update($data);

            return $page;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
