<?php

namespace App\Http\Controllers;

use App\Mail\InquiryMail;
use App\Modules\Models\Category\Category;
use App\Modules\Models\Course\Course;
use App\Modules\Models\Inquiry\Inquiry;
use App\Modules\Models\News\News;
use App\Modules\Models\Page\Page;
use App\Modules\Services\Client\ClientService;
use App\Modules\Services\Country\CountryService;
use App\Modules\Services\Course\CourseService;
use App\Modules\Services\News\NewsService;
use App\Modules\Services\Page\PageService;
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
    protected $news;
    protected $country;
    protected $page;

    public function __construct(
        SliderService $slider,
        TeamService $team,
        TestimonialService $testimonial,
        ClientService $client,
        CourseService $course,
        NewsService $news,
        CountryService $country,
        PageService $page
    ) {
        $this->slider = $slider;
        $this->team = $team;
        $this->testimonial = $testimonial;
        $this->client = $client;
        $this->course = $course;
        $this->news = $news;
        $this->country = $country;
        $this->page = $page;
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
        return view('front.about');
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

    public function internationalDetail($slug = null)
    {
        $country = $this->country->getBySlug($slug);
        $clients = $this->client->frontAll();
        $featuredCourses = $this->course->featuredIntCourse();
        $testimonials = $this->testimonial->frontAll();
        $featuredNews = $this->news->featuredList('news', 4);
        $internationalCourseCat = $this->country->getInternationalCourses($slug);
        return view('front.international-detail', compact('country', 'clients', 'testimonials', 'featuredNews', 'internationalCourseCat', 'featuredCourses'));
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
        $inquiry = Inquiry::create($request->all());
        if ($inquiry) {
            Mail::to('info@greentechconcern.com')->send(new InquiryMail($request->all()));
        }
        return 'Your Inquiry has been send to the administrator.';
    }
    public function Page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('front.page', compact('page'));
    }
}
