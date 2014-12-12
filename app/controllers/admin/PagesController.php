<?php

namespace App\Controllers\Admin;
  
use \Page as Page;
use \Input, Notification, Redirect, Sentry, Str;

use App\Services\Validators\PageValidator;

class PagesController extends \BaseController {
 
    public function index()
    {
        return \View::make('admin.pages.index')->with('pages', Page::all());
    }
}