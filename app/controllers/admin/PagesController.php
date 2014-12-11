<?php

namespace App\Controllers\Admin;
  
use Page;
use Input, Notification, Redirect, Sentry, Str;

use App\Services\Validators\PageValidator;

class PagesController extends \BaseController {
 
    public function index()
    {
        $all = Page::all();
        //return \View::make('admin.index');
        //return \View::make('admin.pages.index')->with('pages', Page::all());
    }

    

}