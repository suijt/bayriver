<?php

namespace App\Http\Controllers\Admin\Inquiry;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Services\Inquiry\InquiryService;
use Kamaln7\Toastr\Facades\Toastr;

class InquiryController extends Controller
{

    protected $inquiry;

    function __construct(InquiryService $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiries = $this->inquiry->paginate();
        return view('admin.inquiry.index', compact('inquiries'));
    }

    public function getAllData()
    {
        return $this->inquiry->getAllData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inquiry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->inquiry->delete($id, 'inquiry');
    }

    public function getAppointment()
    {
        return view('admin.appointment.index');
    }

    public function getAppointmentData()
    {
        return $this->inquiry->getAppointmentData();
    }
    public function destroyAppointment($id)
    {
        return $this->inquiry->delete($id, 'appointment');
    }
    public function getAdvisor()
    {
        return view('admin.advisor.index');
    }
    public function getAdvisorData()
    {
        return $this->inquiry->getAdvisorData();
    }
    public function destroyAdvisor($id)
    {
        return $this->inquiry->delete($id, 'advisor');
    }
    public function getApplication($type = null)
    {
        return view('admin.application.index', compact('type'));
    }

    public function getApplicationData($type = null)
    {
        return $this->inquiry->getApplicationData($type);
    }
    public function destroyApplication($id)
    {
        return $this->inquiry->delete($id, 'application');
    }
}
