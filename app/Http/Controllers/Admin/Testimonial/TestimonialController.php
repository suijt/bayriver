<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Requests\Admin\Testimonial\TestimonialRequest;
use App\Modules\Services\Testimonial\TestimonialService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class TestimonialController extends Controller
{

    protected $testimonial;

    function __construct(TestimonialService $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = $this->testimonial->paginate();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function getAllData()
    {
        return $this->testimonial->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        //        dd($request->all());
        if ($testimonial = $this->testimonial->create($request->all())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $testimonial, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $testimonial, 'banner_image');
            }
            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $testimonial, 'icon_image');
            }

            Toastr::success('Testimonial/Service Image created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.testimonial.index');
        }
        Toastr::error('Testimonial/Service Image cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.testimonial.index');
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
        $testimonial = $this->testimonial->find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        if ($this->testimonial->update($id, $request->all())) {
            $testimonial = $this->testimonial->find($id);
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $testimonial, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $testimonial, 'banner_image');
            }
            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $testimonial, 'icon_image');
            }
            Toastr::success('Testimonial/Service Image updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.testimonial.index');
        }
        Toastr::error('Testimonial/Service Image cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->testimonial->delete($id)) {
            Toastr::success('Testimonial/Service Image deleted successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.testimonial.index');
        }
        Toastr::error('Testimonial/Service Image cannot be deleted.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.testimonial.index');
    }

    function uploadFile(Request $request, $testimonial, $type = null)
    {
        $file = $request->file($type);
        $fileName = $this->testimonial->uploadFile($file);
        if (!empty($testimonial->image))
            $this->testimonial->__deleteImages($testimonial);


        $data[$type] = $fileName;
        $this->testimonial->updateImage($testimonial->id, $data);
    }
}
