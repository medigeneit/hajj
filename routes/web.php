<?php


Auth::routes();

/*admin routes*/

Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Admin\Auth\LoginController@login');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'Admin\HomeController@dashboard');

    Route::resource('users', 'Admin\UsersController');
    Route::get('profile/{id}', 'Admin\UsersController@show');
    Route::get('profile-edit/{id}', 'Admin\UsersController@profile_edit');
    Route::post('profile-update', 'Admin\UsersController@profile_update');

    Route::resource('slider-category', 'Admin\SliderCategoryController');
    Route::resource('sliders', 'Admin\SlidersController');

    Route::resource('menus', 'Admin\MenuController');

    Route::resource('package', 'Admin\PackageController');

    Route::resource('hajj-setup', 'Admin\HajjSetupController');

    Route::resource('hajji', 'Admin\HajjiController');

    Route::resource('news', 'Admin\NewsController');

    Route::resource('testimonial', 'Admin\TestimonialController');

    Route::resource('features', 'Admin\FeaturesController');

    Route::resource('services', 'Admin\ServicesController');

    Route::resource('pages', 'Admin\PagesController');
    Route::resource('products', 'Admin\ProductsController');

    Route::resource('roles', 'Admin\RolesController');
    Route::resource('permissions', 'Admin\PermissionsController');

    Route::get('system-settings', 'Admin\SettingsController@system_settings');
    Route::post('system-settings', 'Admin\SettingsController@system_settings_update');


    Route::post('logout', 'Admin\Auth\LoginController@logout');

});


/*admin ajax*/
Route::post('extra-fields', 'Admin\AjaxController@extra_fields');


Route::get('password/change/{id}', 'UsersController@password_change');
Route::post('password/change', 'UsersController@password_update');


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


/*site url*/
Route::get('/', 'HomeController@index');

Route::get('user/activate/{id}', 'HomeController@activate');



Route::get('myprofile', 'ProfileController@myprofile');
Route::get('myprofile-edit', 'ProfileController@myprofile_edit');
Route::post('myprofile-update', 'ProfileController@myprofile_update');

Route::get('physical-info', 'ProfileController@physical_info');
Route::get('physical-info-edit', 'ProfileController@physical_info_edit');
Route::post('physical-info-update', 'ProfileController@physical_info_update');
Route::post('physical-info-insert', 'ProfileController@physical_info_insert');

Route::get('passport', 'ProfileController@passport');
Route::get('passport-edit', 'ProfileController@passport_edit');
Route::post('passport-update', 'ProfileController@passport_update');
Route::post('passport-insert', 'ProfileController@passport_insert');

Route::get('payments', 'ProfileController@payments');


Route::get('hajj', 'ProfileController@hajj');
Route::get('hajj-create', 'ProfileController@hajj_create');
Route::post('hajj-insert', 'ProfileController@hajj_insert');
Route::get('hajj-edit/{id}', 'ProfileController@hajj_edit');
Route::get('hajj-detail/{id}', 'ProfileController@hajj_detail');
Route::post('hajj-update', 'ProfileController@hajj_update');

Route::get('groups', 'ProfileController@groups');
Route::get('group-create', 'ProfileController@group_create');
Route::post('group-insert', 'ProfileController@group_insert');
Route::get('group-edit/{id}', 'ProfileController@group_edit');
Route::post('group-update', 'ProfileController@group_update');










Route::get('group-edit/{id}', 'ProfileController@group_edit');
Route::get('news/{id}', 'HomeController@news_detail');
Route::get('service/{id}', 'HomeController@service_detail');
Route::get('package/{id}', 'HomeController@package_detail');
Route::post('contact-us-send', 'HomeController@contact_us_send');
Route::get('{title}', 'HomeController@pages');

/*site ajax url*/
Route::post('division-district', 'AjaxController@division_district');
Route::post('district-upzilla', 'AjaxController@district_upzilla');
Route::post('type-package', 'AjaxController@type_package');
Route::post('package-add-to-cart', 'AjaxController@package_add_to_cart');
Route::post('feature-add-to-cart', 'AjaxController@feature_add_to_cart');
Route::post('package-modal', 'AjaxController@package_modal');














