<?php

namespace App\Modules\Services\News;

use App\Modules\Models\News\News;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class NewsService extends Service
{
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->news->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function (News $news) {
                return getTableHtml($news, 'image');
            })
            ->editColumn('title', function (News $news) {
                if (!empty($news->title)) {
                    return '<strong>' . $news->title . '</strong>';
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('type', function (News $news) {
                if ($news->is_event == 'yes') {
                    return '<strong> Event </strong>';
                } else {
                    return '<strong> News </strong>';
                };
            })
            ->editColumn('status', function (News $news) {
                return getTableHtml($news, 'status');
            })
            ->editColumn('actions', function (News $news) {
                $editRoute = route('admin.news.edit', $news->id);
                $deleteRoute = route('admin.news.destroy', $news->id);
                return getTableHtml($news, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image','type', 'status', 'title'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['is_featured'] = (isset($data['is_featured']) ? $data['is_featured'] : '') == 'on' ? 'yes' : 'no';
            $data['is_event'] = (isset($data['is_event']) ? $data['is_event'] : '') == 'on' ? 'yes' : 'no';
            $data['is_headline'] = (isset($data['is_headline']) ? $data['is_headline'] : '') == 'on' ? 'yes' : 'no';
            $data['created_by'] = Auth::user()->id;
            $news = $this->news->create($data);
            return $news;
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

        return $this->news->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->news->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->news->whereStatus('active')->whereIsEvent('no')->orderBy('order', 'asc')->get();
    }

    public function getMostFeatured()
    {
        return $this->news->whereStatus('active')->whereIsEvent('no')->whereIsFeatured('yes')->latest()->first();
    }
    /**
     * Get all User
     *
     * @return Collection
     */
    public function featuredList($type = null, $limit = null, $skip = null)
    {
        if ($skip) {
            return $this->news->whereStatus('active')->whereNotIn('id', [$skip])->whereIsEvent('no')->whereIsFeatured('yes')->take($limit)->get();
        }
        if ($type == 'news') {
            return $this->news->whereStatus('active')->whereIsEvent('no')->whereIsFeatured('yes')->take($limit)->get();
        }
        if ($type == 'event') {
            return $this->news->whereStatus('active')->whereIsEvent('yes')->whereIsFeatured('yes')->take($limit)->get();
        }
    }

    public function highlightList()
    {
        return $this->news->whereStatus('active')->whereIsHeadline('yes')->get();
    }

    /**
     * Get all users with supervisor type
     *
     * @return Collection
     */


    public function find($newsId)
    {
        try {
            return $this->news->find($newsId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($newsId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['is_featured'] = (isset($data['is_featured']) ? $data['is_featured'] : '') == 'on' ? 'yes' : 'no';
            $data['is_event'] = (isset($data['is_event']) ? $data['is_event'] : '') == 'on' ? 'yes' : 'no';
            $data['is_headline'] = (isset($data['is_headline']) ? $data['is_headline'] : '') == 'on' ? 'yes' : 'no';
            $data['last_updated_by'] = Auth::user()->id;
            $news = $this->news->find($newsId);
            $news = $news->update($data);
            return $news;
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
    public function delete($newsId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $news = $this->news->find($newsId);
            $data['is_deleted'] = 'yes';
            return $news = $news->update($data);
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
        return $this->news->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->news->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/news';
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

    public function updateImage($newsId, array $data)
    {
        try {

            $news = $this->news->find($newsId);
            $news = $news->update($data);

            return $news;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
