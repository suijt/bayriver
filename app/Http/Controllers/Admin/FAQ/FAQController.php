<?php

namespace App\Http\Controllers\Admin\FAQ;
use App\Http\Requests\Admin\Page\PageRequest;
use App\Modules\Services\Page\PageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class FAQController extends Controller
{
    protected $faq;
    function __construct(FAQService $faq)
    {
        $this->faq = $faq;
    }
}
