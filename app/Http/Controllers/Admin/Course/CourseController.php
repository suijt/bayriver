<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CourseRequest;
use App\Modules\Services\Category\CategoryService;
use App\Modules\Services\Country\CountryService;
use App\Modules\Services\Course\CourseService;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class CourseController extends Controller
{
    protected $course;
    protected $category;
    protected $country;

    function __construct(CourseService $course, CategoryService $category, CountryService $country)
    {
        $this->course = $course;
        $this->category = $category;
        $this->country = $country;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->course->paginate();
        return view('admin.course.index', compact('courses'));
    }

    public function getAllData()
    {
        return $this->course->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get('status', 'active');
        $countries = $this->country->get('status', 'active');
        return view('admin.course.create', compact('categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        // dd($request->all());
        if ($course = $this->course->create($request->all())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $course, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $course, 'banner_image');
            }
            if ($request->hasFile('secondary_image')) {
                $this->uploadFile($request, $course, 'secondary_image');
            }
            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $course, 'icon_image');
            }

            Toastr::success('Course created successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.course.index');
        }
        Toastr::error('Course cannot be created.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.course.index');
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
        $course = $this->course->find($id);
        $categories = $this->category->get('status', 'active');
        $countries = $this->country->get('status', 'active');

        return view('admin.course.edit', compact('course', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        if ($this->course->update($id, $request->all())) {
            $course = $this->course->find($id);
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $course, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $course, 'banner_image');
            }
            if ($request->hasFile('secondary_image')) {
                $this->uploadFile($request, $course, 'secondary_image');
            }
            if ($request->hasFile('icon_image')) {
                $this->uploadFile($request, $course, 'icon_image');
            }
            Toastr::success('Course updated successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.course.index');
        }
        Toastr::error('Course cannot be updated.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->course->delete($id)) {
            Toastr::success('Course deleted successfully.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('admin.course.index');
        }
        Toastr::error('Course cannot be deleted.', 'Oops !!!', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.course.index');
    }

    function uploadFile(Request $request, $course, $type = null)
    {
        $file = $request->file($type);
        $fileName = $this->course->uploadFile($file);
        if (!empty($course->image))
            $this->course->__deleteImages($course);


        $data[$type] = $fileName;
        $this->course->updateImage($course->id, $data);
    }
}
