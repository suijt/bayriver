<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Requests\Admin\News\NewsRequest;
use App\Modules\Services\News\NewsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class NewsController extends Controller
{

    protected $news;

    function __construct(NewsService $news)
    {
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index');
    }

    public function getAllData()
    {
        return $this->news->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        //        dd($request->all());
        if ($news = $this->news->create($request->all())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $news, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $news, 'banner_image');
            }
            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $news, 'icon_image');
            }

            Toastr::success('News/Service Image created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.news.index');
        }
        Toastr::error('News/Service Image cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->news->find($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        if ($this->news->update($id, $request->all())) {
            $news = $this->news->find($id);
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $news, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $news, 'banner_image');
            }
            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $news, 'icon_image');
            }
            Toastr::success('News/Service Image updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.news.index');
        }
        Toastr::error('News/Service Image cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->news->delete($id)) {
            Toastr::success('News/Service Image deleted successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.news.index');
        }
        Toastr::error('News/Service Image cannot be deleted.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.news.index');
    }

    function uploadFile(Request $request, $news, $type = null)
    {
        $file = $request->file($type);
        $fileName = $this->news->uploadFile($file);
        if (!empty($news->image))
            $this->news->__deleteImages($news);


        $data[$type] = $fileName;
        $this->news->updateImage($news->id, $data);
    }
}
