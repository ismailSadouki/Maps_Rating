<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer {


    public function compose(View $view){
        return $view->with('categories',Category::all());
    }

}