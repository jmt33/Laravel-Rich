<?php

namespace App\Controllers\Admin;
  
use Page as Page;
use Input, Notification, Redirect, Sentry, Str;

use App\Services\Validators\PageValidator;

class PagesController extends \BaseController {
 
    public function index()
    {
        return \View::make('admin.pages.index')->with('pages', Page::all());
    }

    public function create()
    {
        return \View::make('admin.pages.create');
    }

    public function store()
    {
        $validation = new PageValidator;
 
        if ($validation->passes())
        {
            $page          = new Page;
            $page->title   = Input::get('title');
            $page->body    = Input::get('body');
            $page->user_id = Sentry::getUser()->id;
            $page->save();
 
            Notification::success('新增页面成功！');
 
            return Redirect::route('admin.pages.edit', $page->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
    
    public function show($id)
    {
        return \View::make('admin.pages.show')->with('page', Page::find($id))->withAuthor(Sentry::findUserById(Page::find($id)->user_id)->name);
    }
}