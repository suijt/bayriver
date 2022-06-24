<?php

namespace App\Modules\Services\Inquiry;

use App\Modules\Models\Advisor\CourseAdvisor;
use App\Modules\Models\ApplyNow\ApplyNow;
use App\Modules\Models\Booking\Booking;
use App\Modules\Models\Inquiry\Inquiry;
use App\Modules\Services\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class InquiryService extends Service
{
    protected $inquiry;
    protected $booking;
    protected $advisor;
    protected $application;

    public function __construct(Inquiry $inquiry, Booking $booking, CourseAdvisor $advisor, ApplyNow $application)
    {
        $this->inquiry = $inquiry;
        $this->booking = $booking;
        $this->advisor = $advisor;
        $this->application = $application;
    }


    /*For DataTable*/
    public function getAllData()
    {
        $query = $this->inquiry->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('actions', function (Inquiry $inquiry) {
                $editRoute = '';
                $deleteRoute = route('admin.inquiry.destroy', $inquiry->id);
                return getTableHtml($inquiry, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions'])
            ->make(true);
    }
    /*For DataTable*/
    public function getAppointmentData()
    {
        $query = $this->booking->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('actions', function (Booking $appointment) {
                $editRoute = '';
                $deleteRoute = route('admin.appointment.destroy', $appointment->id);
                return getTableHtml($appointment, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions'])
            ->make(true);
    }
    /*For DataTable*/
    public function getAdvisorData()
    {
        $query = $this->advisor->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('actions', function (CourseAdvisor $advisor) {
                $editRoute = '';
                $deleteRoute = route('admin.advisor.destroy', $advisor->id);
                return getTableHtml($advisor, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions'])
            ->make(true);
    }

    /*For DataTable*/
    public function getApplicationData($type = null)
    {
        if ($type == 'resident') {
            $query = $this->application->whereOption('resident')->get();
        } else {
            $query = $this->application->whereOption('international')->get();
        }
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('actions', function (ApplyNow $application) {
                $editRoute = '';
                $deleteRoute = route('admin.application.destroy', $application->id);
                return getTableHtml($application, 'actions', $editRoute, $deleteRoute);
            })->rawColumns(['actions'])
            ->make(true);
    }

    public function create(array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['created_by'] = Auth::user()->id;
            $inquiry = $this->inquiry->create($data);
            return $inquiry;
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

        return $this->inquiry->orderBy('id', 'DESC')->paginate($filter['limit']);
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function all()
    {
        return $this->inquiry->all();
    }

    /**
     * Get all User
     *
     * @return Collection
     */
    public function frontAll()
    {
        return $this->inquiry->whereStatus('active')->orderBy('order', 'asc')->get();
    }

    /**
     * Get all users with supervisor type
     *all
     * @return Collection
     */


    public function find($inquiryId)
    {
        try {
            return $this->inquiry->find($inquiryId);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update($inquiryId, array $data)
    {
        try {
            $data['status'] = (isset($data['status']) ? $data['status'] : '') == 'on' ? 'active' : 'in_active';
            $data['last_updated_by'] = Auth::user()->id;
            $inquiry = $this->inquiry->find($inquiryId);
            $inquiry = $inquiry->update($data);
            return $inquiry;
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
    public function delete($id, $type = null)
    {
        try {
            if ($type == 'inquiry') {
                $inquiry = $this->inquiry->find($id);
                return $inquiry->delete();
            }
            if ($type == 'appointment') {
                $appointment = $this->booking->find($id);
                return $appointment->delete();
            }
            if ($type == 'advisor') {
                $advisor = $this->advisor->find($id);
                return $advisor->delete();
            }
            if ($type == 'application') {
                $application = $this->application->find($id);
                return $application->delete();
            }
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
        return $this->inquiry->whereName($name);
    }

    public function getBySlug($slug)
    {
        return $this->inquiry->whereSlug($slug)->first();
    }

    function uploadFile($file)
    {
        if (!empty($file)) {
            $this->uploadPath = 'uploads/inquiry';
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

    public function updateImage($inquiryId, array $data)
    {
        try {

            $inquiry = $this->inquiry->find($inquiryId);
            $inquiry = $inquiry->update($data);

            return $inquiry;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
