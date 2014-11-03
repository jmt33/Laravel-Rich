<?php

class AdminController extends BaseController
{

    public function __construct()
    {
         //$this->beforeFilter('auth', array('except' => 'getLogin'));
    }
    /**
     * 后台首页
     * @return Response
     */
    public function getIndex()
    {
        return View::make('admin.index');
    }


}
