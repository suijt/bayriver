<?php

namespace App\View\Composers;

use App\Modules\Models\Category\Category;
use Illuminate\View\View;

class AffiliatedComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('affiliatedMenus', Category::whereStatus('active')->with('courses', function ($q) {
            return $q->where('is_affiliated', 'yes');
        })->get());
    }
}
