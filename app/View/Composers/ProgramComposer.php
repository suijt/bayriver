<?php

namespace App\View\Composers;

use App\Modules\Models\Category\Category;
use Illuminate\View\View;

class ProgramComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('programMenus', Category::whereStatus('active')->with('courses', function ($q) {
            return $q->where('is_program', 'yes');
        })->get());
    }
}
