<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Requests\Admin\Slider\SliderRequest;
use App\Modules\Services\Slider\SliderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class SliderController extends Controller
{

    protected $slider;

    function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->slider->paginate();
        return view('admin.slider.index', compact('sliders'));
    }

    public function getAllData()
    {
        return $this->slider->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        //        dd($request->all());
        if ($slider = $this->slider->create($request->all())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $slider);
            }

            Toastr::success('Slider Image created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.slider.index');
        }
        Toastr::error('Slider Image cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.slider.index');
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
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        if ($this->slider->update($id, $request->all())) {
            if ($request->hasFile('image')) {
                $slider = $this->slider->find($id);
                $this->uploadFile($request, $slider);
            }
            Toastr::success('Slider Image updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.slider.index');
        }
        Toastr::error('Slider Image cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->slider->delete($id)) {
            Toastr::success('Slider Image deleted successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.slider.index');
        }
        Toastr::error('Slider Image cannot be deleted.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.slider.index');
    }

    function uploadFile(Request $request, $slider)
    {
        $file = $request->file('image');
        $fileName = $this->slider->uploadFile($file);
        if (!empty($slider->image))
            $this->slider->__deleteImages($slider);


        $data['image'] = $fileName;
        $this->slider->updateImage($slider->id, $data);
    }
}
