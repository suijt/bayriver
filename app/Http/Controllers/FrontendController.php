<?php

namespace App\Http\Controllers;

use App\Mail\InquiryMail;
use App\Modules\Models\Inquiry\Inquiry;
use App\Modules\Services\Client\ClientService;
use App\Modules\Services\Course\CourseService;
use App\Modules\Services\Slider\SliderService;
use App\Modules\Services\Team\TeamService;
use App\Modules\Services\Testimonial\TestimonialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    protected $slider;
    protected $service;
    protected $team;
    protected $testimonial;
    protected $client;
    protected $course;

    public function __construct(
        SliderService $slider,
        TeamService $team,
        TestimonialService $testimonial,
        ClientService $client,
        CourseService $course
    ) {
        $this->slider = $slider;
        $this->team = $team;
        $this->testimonial = $testimonial;
        $this->client = $client;
        $this->course = $course;
    }

    public function index()
    {
        $sliders = $this->slider->frontAll();
        $teams = $this->team->frontAll();
        $testimonials = $this->testimonial->frontAll();
        $clients = $this->client->frontAll();
        $courses = $this->course->featuredCourse();
        return view('front.index', compact('sliders', 'teams', 'testimonials', 'clients', 'courses'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function serviceList()
    {
        $services = $this->service->frontAll();
        return view('front.serviceList', compact('services'));
    }

    public function courseDetail($slug = null)
    {
        $course = $this->course->findBySlug($slug);
        return view('front.courseDetail', compact('course'));
    }

    public function contact()
    {
        $services = $this->service->featuredService();
        return view('front.contact', compact('services'));
    }

    public function contactSubmit(Request $request)
    {
        $inquiry = Inquiry::create($request->all());
        if ($inquiry) {
            Mail::to('info@greentechconcern.com')->send(new InquiryMail($request->all()));
        }
        return 'Your Inquiry has been send to the administrator.';
    }
}
