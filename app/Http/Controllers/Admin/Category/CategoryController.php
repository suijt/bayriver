<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Modules\Services\Category\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;


class CategoryController extends Controller

{
    protected $category;

    function __construct(CategoryService $category)
    {
        $this->category = $category;

        // $this->middleware('permission:view category|create category|edit category|delete category', ['only' => ['index', 'show']]);

        // $this->middleware('permission:create category', ['only' => ['create', 'store']]);

        // $this->middleware('permission:edit category', ['only' => ['edit', 'update']]);

        // $this->middleware('permission:delete category', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
        $categories = $this->category->paginate();

        return view('admin.category.index', compact('categories', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type = null)
    {
        return view('admin.category.create', compact('type'));
    }

    public function getAllData($type = null)
    {
        return $this->category->getAllData($type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, $type = null)
    {
        if ($category = $this->category->create($request->all(), $type)) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $category);
            }

            Toastr::success('Category created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('admin.category.index', $type);
            // return redirect()->back();
        }
        Toastr::error('Category cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('admin.category.index', $type);
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
        $category = $this->category->find($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $type = null)
    {
        if ($this->category->update($id, $request->all())) {
            if ($request->hasFile('image')) {
                $category = $this->category->find($id);
                $this->uploadFile($request, $category);
            }
            Toastr::success('Category updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);

            return redirect()->route('admin.category.index');
        }
        Toastr::error('Category cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type = null)
    {
        if ($this->category->delete($id)) {
            return response()->json(['success' => 'record deleted']);
        }

        return response()->json(['error' => 'record cannot be deleted']);
    }

    function uploadFile(Request $request, $category)
    {
        $file     = $request->file('image');
        $fileName = $this->category->uploadFile($file);
        if (!empty($category->image)) {
            $this->category->__deleteImages($category);
        }

        $data['image'] = $fileName;
        $this->category->updateImage($category->id, $data);
    }
}
