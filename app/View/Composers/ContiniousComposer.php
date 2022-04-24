<?php

namespace App\View\Composers;

use App\Modules\Models\Category\Category;
use Illuminate\View\View;

class ContiniousComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('continiousMenus', Category::whereStatus('active')->with('courses', function ($q) {
            return $q->where('is_continious', 'yes');
        })->get());
    }
}
