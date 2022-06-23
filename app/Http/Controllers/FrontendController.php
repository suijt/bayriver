<?php

namespace App\Http\Controllers;

use App\Mail\InquiryMail;
use App\Mail\ApplyMail;
use App\Mail\BookingMail;
use App\Mail\AdvisorMail;
use App\Modules\Models\Booking\CourseBooking;
use App\Modules\Models\Advisor\CourseAdvisor;
use App\Modules\Models\Advisor\InternationalAdvisor;
use App\Modules\Models\Booking\InternationalBooking;
use App\Modules\Models\Category\Category;
use App\Modules\Models\FAQ\Faq;
use App\Modules\Models\ApplyNow\ApplyNow;
use App\Modules\Models\Inquiry\Inquiry;
use App\Modules\Models\News\News;
use App\Modules\Models\Page\Page;
use App\Modules\Models\Booking\Booking;
use App\Modules\Services\Client\ClientService;
use App\Modules\Services\Country\CountryService;
use App\Modules\Services\Course\CourseService;
use App\Modules\Services\FAQ\FAQService;
use App\Modules\Services\News\NewsService;
use App\Modules\Services\Page\PageService;
use App\Modules\Services\Slider\SliderService;
use App\Modules\Services\Team\TeamService;
use App\Modules\Services\Testimonial\TestimonialService;
use Illuminate\Http\Request;
use App\Http\Requests\Front\ApplyNow\ApplyNowRequest;
use App\Http\Requests\Front\Course\CourseRequest;
use App\Http\Requests\Front\International\InternationalRequest;
use App\Http\Requests\Front\Booking\BookingRequest;
use App\Rules\Recaptcha;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Kamaln7\Toastr\Facades\Toastr;

class FrontendController extends Controller
{
    protected $slider;
    protected $service;
    protected $team;
    protected $testimonial;
    protected $client;
    protected $course;
    protected $news;
    protected $country;
    protected $page;
    protected $faq;

    public function __construct(
        SliderService $slider,
        TeamService $team,
        TestimonialService $testimonial,
        ClientService $client,
        CourseService $course,
        NewsService $news,
        CountryService $country,
        PageService $page,
        FAQService $faq
    ) {
        $this->slider = $slider;
        $this->team = $team;
        $this->testimonial = $testimonial;
        $this->client = $client;
        $this->course = $course;
        $this->news = $news;
        $this->country = $country;
        $this->page = $page;
        $this->faq = $faq;
    }

    public function index()
    {
        $categories = Category::whereStatus('active')->with('courses', function ($q) {
            return $q->where('is_program', 'yes');
        })->get();
        // dd($cat);
        $sliders = $this->slider->frontAll();
        $teams = $this->team->frontAll();
        $testimonials = $this->testimonial->frontAll();
        $clients = $this->client->frontAll();
        $courses = $this->course->featuredCourse();
        $mostFeaturedNews = $this->news->getMostFeatured();
        if ($mostFeaturedNews) {
            $featuredNews = $this->news->featuredList('news', 2, $mostFeaturedNews->id);
        } else {
            $featuredNews = collect();
        }

        $featuredEvents = $this->news->featuredList('event', 3);
        $highlights = $this->news->highlightList();

        return view('front.index', compact('sliders', 'teams', 'testimonials', 'clients', 'courses', 'featuredNews', 'featuredEvents', 'mostFeaturedNews', 'highlights', 'categories'));
    }

    public function about()
    {
        $testimonials = $this->testimonial->frontAll();
        $featuredNews = $this->news->featuredList('news', 4);
        $faqs = $this->faq->all();
        return view('front.about', compact('featuredNews', 'testimonials', 'faqs'));
    }

    public function research()
    {
        return view('front.research');
    }

    public function alumni()
    {
        return view('front.alumni');
    }

    public function serviceList()
    {
        $services = $this->service->frontAll();
        return view('front.serviceList', compact('services'));
    }

    public function courseDetail($slug = null)
    {
        $course = $this->course->findBySlug($slug);
        $clients = $this->client->frontAll();
        $testimonials = $this->testimonial->frontAll();
        $relatedCourses = $this->course->getRelatedCourses($course);
        $featuredNews = $this->news->featuredList('news', 4);
        return view('front.courseDetail', compact('course', 'clients', 'relatedCourses', 'testimonials', 'featuredNews'));
    }

    public function courseSubmit(CourseRequest $request)
    {
        $booking = CourseBooking::create($request->all());
        if ($booking) {
            $data = array(
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone'],
                'message' => $request['address'],
            );
            Mail::to('admissions@bayrivercollge.ca')->send(new BookingMail($data));
        }
        return 'Your Inquiry has been send to the administrator.';
    }

    public function courseAdvisor(CourseRequest $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => ['required', new Recaptcha()]
        ]);
        try {
            $advisor = CourseAdvisor::create($request->all());
            if ($advisor) {
                $data = array(
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone_number' => $request['phone'],
                    'interest' => $request['interest'],
                    'program_name' => $request['program_name'],
                    'message' => $request['message'],
                );
                Mail::to('admissions@bayrivercollge.ca')->send(new AdvisorMail($data));
                Toastr::success('Your Inquiry has been send to the administrator.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } catch (Exception $e) {

            Toastr::error('Something went wrong please try again.', 'Failed !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back();
        }
    }

    public function internationalCourses()
    {
        $countries = $this->country->frontAll();
        $courses = $this->course->featuredIntCourse();
        $clients = $this->client->frontAll();
        $courses = $this->course->featuredCourse();
        $mostFeaturedNews = $this->news->getMostFeatured();
        if ($mostFeaturedNews) {
            $featuredNews = $this->news->featuredList('news', 2, $mostFeaturedNews->id);
        } else {
            $featuredNews = collect();
        }

        $featuredEvents = $this->news->featuredList('event', 3);
        $highlights = $this->news->highlightList();

        return view('front.international-list', compact('countries', 'courses', 'clients', 'featuredNews', 'featuredEvents', 'mostFeaturedNews', 'highlights'));
    }

    public function internationalSubmit(InternationalRequest $request)
    {
        $booking = InternationalBooking::create($request->all());
        if ($booking) {
            $data = array(
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone'],
                'message' => $request['address'],
            );
            Mail::to('admissions@bayrivercollge.ca')->send(new BookingMail($data));
        }
        return 'Your Inquiry has been send to the administrator.';
    }

    public function internationalAdvisor(InternationalRequest $request)
    {
        $advisor = InternationalAdvisor::create($request->all());
        if ($advisor) {
            $data = array(
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone'],
                'message' => $request['message'],
            );
            Mail::to('admissions@bayrivercollge.ca')->send(new AdvisorMail($data));
        }
        return 'Your Inquiry has been send to the administrator.';
    }

    public function internationalDetail($slug = null)
    {
        $country = $this->country->getBySlug('international');
        $clients = $this->client->frontAll();
        $featuredCourses = $this->course->featuredIntCourse();
        $testimonials = $this->testimonial->frontAll();
        $featuredNews = $this->news->featuredList('news', 4);
        $internationalCourseCat = $this->country->getInternationalCourses($slug);
        $coursesInternational = $this->course->getByType('international');

        return view('front.international-detail', compact('country', 'clients', 'testimonials', 'coursesInternational', 'featuredNews', 'internationalCourseCat', 'featuredCourses'));
    }

    public function booking(BookingRequest $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => ['required', new Recaptcha()]
        ]);
        try {
            $booking = Booking::create($request->all());
            if ($booking) {
                $data = array(
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone_number' => $request['phone'],
                    'address' => $request['address'],
                    'date' => $request['date'],
                );
                Mail::to('admissions@bayrivercollge.ca')->send(new BookingMail($data));
                Toastr::success('Your Appointment has been send to the administrator.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } catch (Exception $e) {
            Toastr::error('Something went wrong please try again.', 'Failed !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back();
        }
    }


    public function newsList()
    {
        $news = $this->news->frontAll();

        return view('front.news-list', compact('news'));
    }

    public function newsDetail($slug = null)
    {
        $newsDetail = $this->news->getBySlug($slug);
        return view('front.news-detail', compact('newsDetail'));
    }

    public function contact()
    {
        return view('front.contact');
    }


    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => ['required', new Recaptcha()]
        ]);
        try {

            $inquiry = Inquiry::create($request->all());
            if ($inquiry) {
                Mail::to('admissions@bayrivercollge.ca')->send(new InquiryMail($request->all()));
                Toastr::success('Your Inquiry has been send to the administrator.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } catch (Exception $e) {

            Toastr::error('Something went wrong please try again.', 'Failed !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back();
        }
    }

    public function apply()
    {
        $coursesResidental = $this->course->getByType('home');
        $coursesInternational = $this->course->getByType('international');
        return view('front.apply', compact('coursesResidental', 'coursesInternational'));
    }

    public function applySubmit(ApplyNowRequest $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => ['required', new Recaptcha()]
        ]);
        try {

            $apply_now = $this->course->applyCreate($request->all());
            if ($apply_now) {
                if ($request['option'] == 'residental') {
                    $data = array(
                        'option' =>  $request['option'],
                        'name' => $request['first_name'] . ' ' . $request['last_name'],
                        'email' => $request['email'],
                        'phone_number' => $request['phone_number'],
                        'address' => $request['address'],
                        'study' => implode(',', $request['study']),
                        'interest' => $request['interest'],
                        'time' => implode(',', $request['time']),
                        'hear' => implode(',', $request['hear'])
                    );
                } else {
                    $data = array(
                        'option' =>  $request['option'],
                        'name' => $request['first_name'] . ' ' . $request['last_name'],
                        'email' => $request['email'],
                        'nationality' => $request['nationality'],
                        'passport_number' => $request['passport_number'],
                        'date_of_birth' => $request['date'],
                        'gender' => $request['gender'],
                        'address' => $request['address'],
                        'state' => $request['state'],
                        'country_name' => $request['country_name'],
                        'zip_code' => $request['zip_code'],
                        'emergency_contact_name' => $request['emergency_contact_name'],
                        'emergency_contact_address' => $request['emergency_contact_address'],
                        'emergency_contact_state' => $request['emergency_contact_state'],
                        'emergency_contact_country_name' => $request['emergency_contact_country_name'],
                        'emergency_contact_email' => $request['emergency_contact_email'],
                        'emergency_contact_number' => $request['emergency_contact_number'],
                        'interest' => $request['interest'],
                        'payment' => $request['payment'],
                        'hear' => implode(',', $request['hear']),
                        'checklist' => isset($request['checklist']) ? implode(',', $request['checklist']) : ''
                    );
                }
                Mail::to('admissions@bayrivercollege.ca')->send(new ApplyMail($data));
                Toastr::success('Your Enrollment has been send to the administrator.', 'Success !!!', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } catch (Exception $e) {

            Toastr::error('Something went wrong please try again.', 'Failed !!!', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back();
        }
    }

    public function Page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('front.page', compact('page'));
    }
}
