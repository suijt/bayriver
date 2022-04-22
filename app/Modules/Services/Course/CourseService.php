<?php

namespace App\Modules\Services\Course;

use App\Modules\Models\Course\Course;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CourseService extends Service
{
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->course->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function (Course $course) {
                return getTableHtml($course, 'image');
            })
            ->editColumn('title', function (Course $course) {
                if (!empty($course->title)) {
                    return '<strong>' . $course->title . '</strong>';
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('status', function (Course $course) {
                return getTableHtml($course, 'status');
            })
            ->editColumn('actions', function (Course $course) {
                $editRoute = route('admin.course.edit', $course->id);
                $deleteRoute = route('admin.course.destroy', $course->id);
                return getTableHtml($course, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image', 'status', 'title'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['is_featured'] = (isset($data['is_featured']) ? $data['is_featured'] : '') == 'on' ? 'yes' : 'no';
            $data['is_program'] = (isset($data['is_program']) ? $data['is_program'] : '') == 'on' ? 'yes' : 'no';
            $data['is_affiliated'] = (isset($data['is_affiliated']) ? $data['is_affiliated'] : '') == 'on' ? 'yes' : 'no';
            $data['is_continious'] = (isset($data['is_continious']) ? $data['is_continious'] : '') == 'on' ? 'yes' : 'no';
            $data['is_international'] = (isset($data['is_international']) ? $data['is_international'] : '') == 'on' ? 'yes' : 'no';
            $data['created_by'] = Auth::user()->id;
            $course = $this->course->create($data);
            return $course;
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

        return $this->course->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->course->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->course->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function featuredCourse()
    {
        return $this->course->whereStatus('active')->whereIsFeatured('yes')->whereIsInternational('no')->orderBy('order', 'asc')->get();
    }

    public function featuredIntCourse()
    {
        return $this->course->whereStatus('active')->whereIsFeatured('yes')->whereIsInternational('yes')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all users with supervisor type
     *all
     * @return Collection
     */


    public function find($courseId)
    {
        try {
            return $this->course->find($courseId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function findBySlug($courseSlug)
    {
        try {
            return $this->course->whereSlug($courseSlug)->first();
        } catch (Exception $e) {
            return null;
        }
    }

    public function getRelatedCourses($course)
    {
        $courseCat = $course->category;
        // dd($courseCat,$course);
        return $this->course->whereCategoryId($courseCat->id)->whereNotIn('id', [$course->id])->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    public function update($courseId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['is_featured'] = (isset($data['is_featured']) ? $data['is_featured'] : '') == 'on' ? 'yes' : 'no';
            $data['is_program'] = (isset($data['is_program']) ? $data['is_program'] : '') == 'on' ? 'yes' : 'no';
            $data['is_affiliated'] = (isset($data['is_affiliated']) ? $data['is_affiliated'] : '') == 'on' ? 'yes' : 'no';
            $data['is_continious'] = (isset($data['is_continious']) ? $data['is_continious'] : '') == 'on' ? 'yes' : 'no';
            $data['is_international'] = (isset($data['is_international']) ? $data['is_international'] : '') == 'on' ? 'yes' : 'no';
            $data['last_updated_by'] = Auth::user()->id;
            $course = $this->course->find($courseId);
            $course = $course->update($data);
            return $course;
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
    public function delete($courseId)
    {
        try {
            $data['last_deleted_by'] = Auth::user()->id;
            $data['deleted_at'] = Carbon::now();
            $course = $this->course->find($courseId);
            $data['is_deleted'] = 'yes';
            return $course = $course->update($data);
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
        return $this->course->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->course->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/course';
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

    public function updateImage($courseId, array $data)
    {
        try {

            $course = $this->course->find($courseId);
            $course = $course->update($data);

            return $course;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
