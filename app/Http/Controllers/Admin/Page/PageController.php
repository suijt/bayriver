<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Requests\Admin\Page\PageRequest;
use App\Modules\Services\Page\PageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;


class PageController extends Controller

{
    protected $page;

    function __construct(PageService $page)
    {
        $this->page = $page;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->page->paginate();

        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    public function getAllData()
    {
        return $this->page->getAllData();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        if ($page = $this->page->create($request->all())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $page, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $page, 'banner_image');
            }

            Toastr::success('Page created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('admin.page.index');
            // return redirect()->back();
        }
        Toastr::error('Page cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('admin.page.index');
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $type = null)
    {
        $page = $this->page->find($id);

        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        if ($this->page->update($id, $request->all())) {
            $page = $this->page->find($id);
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $page, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $page, 'banner_image');
            }
            Toastr::success('Page updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('admin.page.index');
        }
        Toastr::error('Page cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->page->delete($id)) {
            Toastr::success('Page Image deleted successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.page.index');
        }
        Toastr::error('Page Image cannot be deleted.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.page.index');
    }

    function uploadFile(Request $request, $page, $type = null)
    {
        if($type== 'image') {
            $file = $request->file('image');
            $fileName = $this->page->uploadFile($file);
            if (!empty($page->image)) {
                $this->page->__deleteImages($page);
            }

            $data['image'] = $fileName;
            $this->page->updateImage($page->id, $data);
        }

        if ($type == 'banner_image') {
        $file = $request->file('banner_image');
        $fileName = $this->page->uploadFile($file);
        if (!empty($page->banner_image))
            $this->page->__deleteImages($page);
        $data['banner_image'] = $fileName;
        $this->page->updateImage($page->id, $data);
    }
    }
}
