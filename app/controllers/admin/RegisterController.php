<?php

namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;

class RegisterController extends BaseController
{
  public function show()
  {
    return View::make('users.register');
  }

  /**
   * 显示登录页面
   * @return View
   */
  public function getLogin()
  {
    return View::make('admin.auth.login');
  }

  /**
   * POST 登录验证
   * @return Redirect
   */
  public function postRegister()
  {
      try {
          $password = Input::get('password');
          $password_confirmation = Input::get('password_confirmation');
          if ($password !== $password_confirmation) {
              throw new \Exception("密码要一致");
          }

          $user = Sentry::createUser(array(
              'email'     => Input::get('email'),
              'password'  => Input::get('password'),
              'first_name' => 'OO',
              'last_name'  => Input::get('username'),
              'activated' => true
          ));

          // Find the group using the group id
          $adminGroup = Sentry::findGroupById(3);

          // Assign the group to the user
          $user->addGroup($adminGroup);
          Redirect::route('admin.login');

      } catch (\Cartalyst\Sentry\Users\LoginRequiredException $e) {
          return Redirect::route('admin.register')->withErrors(
              array(
                  'register' => '用户名必须可写'
              )
          );
      } catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e) {
          return Redirect::route('admin.register')->withErrors(
              array(
                  'register' => '密码必须可写'
              )
          );
      } catch (\Cartalyst\Sentry\Users\UserExistsException $e) {
          return Redirect::route('admin.register')->withErrors(
              array(
                  'register' => '系统含有此用户'
              )
          );
      } catch (\Exception $e) {
          return Redirect::route('admin.register')->withErrors(
              array(
                  'register' => $e->getMessage()
              )
          );
      }
     
  }

  /**
   * 注销
   * @return Redirect
   */
  public function getLogout()
  {
    Sentry::logout();

    return Redirect::route('admin.login');
  }

}