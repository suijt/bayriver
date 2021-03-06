<?php

namespace App\Modules\Services\Course;

use App\Modules\Models\ApplyNow\ApplyNow;
use App\Modules\Models\Course\Course;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CourseService extends Service
{
    protected $course;
    protected $apply;

    public function __construct(Course $course, ApplyNow $apply)
    {
        $this->course = $course;
        $this->apply = $apply;
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
            ->editColumn('category', function (Course $course) {
                return $course->category->name;
            })
            ->editColumn('status', function (Course $course) {
                return getTableHtml($course, 'status');
            })
            ->editColumn('featured', function (Course $course) {
                if ($course->is_featured == 'yes') {
                    return '<label data-uk-tooltip title="yes" class="badge font-weight-bold badge-light-success badge-inline">Yes</label>';
                } else {
                    return '<label data-uk-tooltip title="no" class="badge font-weight-bold badge-light-danger badge-inline">No</label>';;
                };
            })
            ->editColumn('program', function (Course $course) {
                if ($course->is_program == 'yes') {
                    return '<label data-uk-tooltip title="yes" class="badge font-weight-bold badge-light-success badge-inline">Yes</label>';
                } else {
                    return '<label data-uk-tooltip title="no" class="badge font-weight-bold badge-light-danger badge-inline">No</label>';;
                };
            })
            ->editColumn('affiliated', function (Course $course) {
                if ($course->is_affiliated == 'yes') {
                    return '<label data-uk-tooltip title="yes" class="badge font-weight-bold badge-light-success badge-inline">Yes</label>';
                } else {
                    return '<label data-uk-tooltip title="no" class="badge font-weight-bold badge-light-danger badge-inline">No</label>';;
                };
            })
            ->editColumn('continious', function (Course $course) {
                if ($course->is_continious == 'yes') {
                    return '<label data-uk-tooltip title="yes" class="badge font-weight-bold badge-light-success badge-inline">Yes</label>';
                } else {
                    return '<label data-uk-tooltip title="no" class="badge font-weight-bold badge-light-danger badge-inline">No</label>';;
                };
            })
            ->editColumn('international', function (Course $course) {
                if ($course->is_international == 'yes') {
                    return '<label data-uk-tooltip title="yes" class="badge font-weight-bold badge-light-success badge-inline">Yes</label>';
                } else {
                    return '<label data-uk-tooltip title="no" class="badge font-weight-bold badge-light-danger badge-inline">No</label>';;
                };
            })
            ->editColumn('actions', function (Course $course) {
                $editRoute = route('admin.course.edit', $course->id);
                $deleteRoute = route('admin.course.destroy', $course->id);
                return getTableHtml($course, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions', 'image', 'status', 'title', 'featured', 'program', 'affiliated', 'continious', 'international'])
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

    public function getByType($type = null)
    {
        if ($type == 'home') {
            return $this->course->whereStatus('active')->orderBy('order', 'asc')->whereIsInternational('no')->get();
        }
        if ($type == 'international') {
            return $this->course->whereStatus('active')->orderBy('order', 'asc')->whereIsInternational('yes')->get();
        }
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function featuredCourse()
    {
        // return $this->course->whereStatus('active')->whereIsFeatured('yes')->whereIsInternational('no')->orderBy('order', 'asc')->get();
        return $this->course->whereStatus('active')->whereIsFeatured('yes')->orderBy('order', 'asc')->get();
    }

    public function featuredIntCourse()
    {
        // return $this->course->whereStatus('active')->whereIsFeatured('yes')->whereIsInternational('yes')->orderBy('order', 'asc')->get();
        return $this->course->whereStatus('active')->whereIsFeatured('yes')->orderBy('order', 'asc')->get();
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

    public function applyCreate(array $data)
    {
        try {
            $data['study'] = isset($data['study']) ? implode(',', $data['study']) : '';
            $data['time'] = isset($data['time']) ? implode(',', $data['time']) : '';
            $data['hear'] = isset($data['hear']) ? implode(',', $data['hear']) : '';
            $data['checklist'] = isset($data['checklist']) ? implode(',', $data['checklist']) : '';
            $data['program'] = isset($data['agent_name']) ? $data['agent_name'] : '';
            $apply = $this->apply->create($data);
            return $apply;
        } catch (Exception $e) {
            return null;
        }
    }
}
