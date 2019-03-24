<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Broadcast::routes(['middleware' => ['web']]);

Route::get('/', function () {
    return view('welcome');
});

//Route::post('/broadcasting/auth','Broadcast\BrodcastController@authenticate');




Route::get('/download','Files\FileController@makeDownloadLink');
//Route::get('/test','Files\FileController@test');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin-logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');


  Route::get('/userlist','Admin\AdminController@userlist');
  Route::get('/acclist','Admin\AdminController@accountantList');

  Route::get('/chatmsg','Admin\ChatController@getChats');



  Route::get('/user/userlist','Admin\SiteController@showUserList');
  Route::get('/user/adduser','Admin\SiteController@showAddUser');
  Route::get('/user/newusers','Admin\SiteController@showNewUsers');
  Route::get('/user/blockedusers','Admin\SiteController@showBlockedUsers');


  Route::get('/accountant/accountantlist','Admin\SiteController@showAccountantList');
  Route::get('/accountant/addaccountant','Admin\SiteController@showAddAccountant');

  Route::get('/projects/projectlist','Admin\SiteController@showProjectList');
  Route::get('/projects/project','Admin\SiteController@showProject')->name('show-admin-project');
});

Route::group(['prefix' => 'accountant'], function () {
  Route::get('/login', 'AccountantAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AccountantAuth\LoginController@login');
  Route::post('/logout', 'AccountantAuth\LoginController@logout')->name('accountant-logout');

  Route::get('/register', 'AccountantAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AccountantAuth\RegisterController@register')->name('register-post-accountant');

  Route::post('/password/email', 'AccountantAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AccountantAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AccountantAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AccountantAuth\ResetPasswordController@showResetForm');

  Route::get('/projects/projectlist','Accountant\SiteController@showProject');
  Route::get('/projects/projects','Accountant\SiteController@showProjectByUser');
  //Route::get('/projects/project','Accountant\SiteController@showProject')->name('show-admin-project');
});

Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegisterController@register')->name('post-register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');

  Route::get('/projectview','Project\ProjectController@showProjects')->name('show-project');
  Route::post('/project','Project\ProjectController@createProject')->name('post-project');

  //Route::get('/test', 'Files\FileController@test');

  Route::get('/upload','Files\FileController@showUpload');
  Route::post('/postupload','Files\FileController@fileUpload')->name('post-upload');

  Route::get('/chat','Admin\ChatController@showChat')->name('show-chat');

  Route::get('/getmsges','Admin\ChatController@getChatMsges')->name('test-route');
  Route::post('/postmsges','Admin\ChatController@sendMsges')->name('post-chat-msges');

  Route::post('/chatmessages','Admin\ChatController@getChat')->name('post-chat');

  Route::get('/projects/projectlist','User\SiteController@showProjectList');
  //Route::get('/projects/project','Admin\SiteController@showProject')->name('show-admin-project');

  // Route::get('/home',['middleware'=>'auth', function () {
  //     return redirect('final.Admin.layout.admin');
  // }])->name('user-home');

});

Route::get('/email','Email\EmailController@sendMail')->name('send-mail');

Route::get('/adminchats', 'Admin\ChatController@getChatMsges');

Route::post('/API/getuserprojects','API\ProjectController@getUserProjects');
Route::post('/API/getaccountantprojects','API\ProjectController@getAccountantProjects');
Route::post('/API/getChatMessages','API\ProjectController@getChatMessages');
Route::post('/API/sendChatMessages','API\ProjectController@sendChatMessages');
