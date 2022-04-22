<?php

namespace App\View\Composers;

use App\Modules\Models\Product\Product;
use Illuminate\View\View;

class ProductComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        // $view->with('footServices', Product::whereStatus('active')->whereIsFooter('yes')->take(5)->get());
    }
}
