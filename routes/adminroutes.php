<?php
use Illuminate\Support\Facades\Route;
//for superadmin

Route::group(['prefix' => 'backside/admin', 'as' => 'backside.admin.'], function () {
    //    auth
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\AdminRegisterController@create']);
    Route::post('register', ['as' => 'registered', 'uses' => 'Auth\AdminRegisterController@store']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\AdminLoginController@logout']);
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\AdminLoginController@loginform']);
    Route::post('login', ['as' => 'logined', 'uses' => 'Auth\AdminLoginController@login']);

});

Route::middleware(['auth:admin'])->group(function () {
    // adminregister
    Route::get('/admin_register_create', 'Admin\AdminRegisterController@create_admin_register')->name('create_admin_register');
    Route::get('/admin_register_list', 'Admin\AdminRegisterController@show_list')->name('admin_register_list');
    Route::get('/edit_admin_register/{id}', 'Admin\AdminRegisterController@edit_admin_register')->name('edit_admin');
    Route::post('/update_admin/{id}', 'Auth\AdminRegisterController@update_admin_list')->name('update_admin');
    Route::post('/delete_admin_register', 'Auth\AdminRegisterController@delete_admin_list')->name('delete_admin');
    Route::get('/change_password', 'ChangePasswordController@index')->name('change_password');
    Route::post('/change_pass_store', 'ChangePasswordController@store')->name('change_password_store');
    Route::get('/update_pass', 'UpdatePasswordController@index')->name('update_password');
    Route::post('/update_pass_store', 'UpdatePasswordController@store')->name('update_password_store');
    
    // banner
    Route::get('/admin', 'Admin\AdminController@create_banner')->name('create_banner');
    Route::post('/store_banner', 'Admin\AdminController@store_banner_data')->name('store_banners');
    Route::get('/show_banner', 'Admin\AdminController@show_banner_list')->name('show_banner');
    Route::get('/edit_banner/{id}', 'Admin\AdminController@edit_banner_list')->name('edit_banner');
    Route::post('/update_banner/{id}', 'Admin\AdminController@update_banner_list')->name('update_banner');

    Route::post('/delete_banner', 'Admin\AdminController@delete_banner_list')->name('delete_banner');

    // zh-dashboard
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('/list_registerlog', 'Admin\AdminController@list_registerlog')->name('list_registerlog');
    Route::get('/get_list_registerlog', 'Admin\AdminController@getUserRegister')->name('get_registerlog');

    //testimonial
    Route::get('/testimonial_list', 'Admin\TestimonialController@show_testimonial_list')->name('testimonial_list');
    Route::get('/add_testimonial', 'Admin\TestimonialController@add_testimonial_data')->name('add_testimonial');
    Route::post('/store_testimonial', 'Admin\TestimonialController@store_testimonial_data')->name('store_testimonial');
    Route::post('/delete_test', 'Admin\TestimonialController@delete_testimonial_list')->name('delete_test');
    Route::get('/edit_testimonial/{id}', 'Admin\TestimonialController@edit_testimonial')->name('edit_testimonial');
    Route::post('/update_testimonial/{id}', 'Admin\TestimonialController@update_testimonial_list')->name('update_testimonial');

    // Suit
    Route::get('/add_category', 'Admin\AdminController@create_category_data')->name('add_category');
    Route::post('/store_category', 'Admin\AdminController@store_category_data')->name('store_category');
    Route::get('/show_category_list', 'Admin\AdminController@show_category')->name('show_category_list');

    //fit-suit
    Route::get('/show_fit_suit_list', 'Admin\FitSuitController@show_list')->name('show_fit_suit_list');
    Route::post('/store_fit_suit', 'Admin\FitSuitController@store_fit_suit_data')->name('store_fit_suit');
    Route::get('/edit_fit_suit/{id}', 'Admin\FitSuitController@edit_fit_suit_data')->name('edit_fit_suit');
    Route::get('/add_fit_suit', 'Admin\FitSuitController@add_fit_suit_data')->name('add_fit_suit');
    Route::post('/get_edit_fit_suit', 'Admin\FitSuitController@get_edit_fit_suit_data')->name('get_edit_fit_suit');
    Route::post('/store_edit_fit_suit', 'Admin\FitSuitController@store_edit_fit_suit_data')->name('store_edit_fit_suit');


    Route::post('/delete_fit_suit', 'Admin\FitSuitController@delete_fit_suit_data')->name('delete_fit_suit');


    Route::get('/get_texture', 'Admin\FitSuitController@get_texture_data')->name('get_texture');
    Route::get('/get_style', 'Admin\FitSuitController@get_style_data')->name('get_style');
    Route::get('/get_color', 'Admin\FitSuitController@get_color_data')->name('get_color');
    Route::get('/get_color', 'Admin\FitSuitController@get_color_data')->name('get_color');
    Route::get('/get_size', 'Admin\FitSuitController@get_size_data')->name('get_size');
    Route::get('/get_jacket_button_ajax', 'Admin\TopController@get_jacket_button_all')->name('get_jacket_button_ajax');
    Route::get('/get_customize_cate', 'Admin\FitSuitController@get_customize_cate')->name('get_customize_cate');
    Route::get('/get_style_cate', 'Admin\FitSuitController@get_style_cate')->name('get_style_cate');
    Route::get('/get_vest_lapel_ajax', 'Admin\Shirt_ButtonController@get_vest_lapel_all')->name('get_vest_lapel');
    Route::get('/get_pant_pleat_ajax', 'Admin\PantController@get_pant_pleat_all')->name('get_pant_pleat');


    // Categories
    // Ready To Weare
    Route::get('get_ready_to_wear', 'Admin\ReadyController@get_ready_to_wear_data')->name('get_ready_to_wear');
    Route::get('create_ready_to_wear', 'Admin\ReadyController@create_ready_to_wear_data')->name('create_ready_to_wear');
    Route::post('/get_grand_texture', 'Admin\ReadyController@get_grand_texture_data')->name('get_grand_texture');
    Route::post('/store_ready_to_wear', 'Admin\ReadyController@store_ready_to_wear_data')->name('store_ready_to_wear');
    Route::get('/edit_ready_to_wear/{id}', 'Admin\ReadyController@edit_ready_to_wear_data')->name('edit_ready_to_wear');
    Route::post('/get_edit_ready_to_wear', 'Admin\ReadyController@get_edit_ready_to_wear_data')->name('get_edit_ready_to_wear');
    Route::get('/get_grand_texture_all', 'Admin\ReadyController@get_grand_texture_all_data')->name('get_grand_texture_all');
    Route::post('/store_edit_ready_to_wear', 'Admin\ReadyController@store_edit_ready_to_wear_data')->name('store_edit_ready_to_wear');
    Route::get('/get_style_category', 'Admin\ReadyController@get_style_category_data')->name('get_style_category');

    Route::post('/delete_ready_to_wear', 'Admin\ReadyController@delete_ready_to_wear_data')->name('delete_ready_to_wear');



    // Texture
    Route::get('/edit_texture/{id}', 'Admin\TextureController@edit_texture_data')->name('edit_texture');
    Route::get('/add_texture', 'Admin\TextureController@create')->name('grand_texture');
    Route::post('/get_edit_texture', 'Admin\TextureController@get_edit_texture_data')->name('get_edit_texture');
    Route::post('/store_edit_texture', 'Admin\TextureController@store_edit_texture_data')->name('store_edit_texture');
    Route::post('/delete_texture', 'Admin\TextureController@delete_texture_data')->name('delete_texture');
    Route::post('/store_texture','Admin\TextureController@store_texture');
    Route::get('/grand_texture_list','Admin\TextureController@list')->name('grand_texture_list');
    Route::post('/increase_count_texture', 'Admin\TextureController@increase_count_texture_data')->name('increase_count_texture');
 


    //Main Texture
    Route::get('/main_texture_list', 'Admin\TextureController@show_main_texture_list')->name('main_texture_list');

    Route::get('/add_main_texture', 'Admin\TextureController@show_add_main_texture')->name('add_main_texture');
    Route::post('/store_main_texture', 'Admin\TextureController@store_main_texture_data')->name('store_main_texture');
    Route::post('/delete_main_texture', 'Admin\TextureController@delete_main_texture_data')->name('delete_main_texture');
    Route::post('/update_main_texture/{id}', 'Admin\TextureController@update_main_texture_data')->name('update_main_texture');

    //Main Texture SubCategory
    Route::get('/main_texture_sub_list', 'Admin\TextureController@show_main_texture_sub_list')->name('main_texture_sub_list');

    Route::get('/add_main_texture_sub', 'Admin\TextureController@show_add_main_texture_sub')->name('add_main_texture_sub');
    Route::post('/store_main_texture_sub', 'Admin\TextureController@store_main_texture_sub_data')->name('store_main_texture_sub');
    Route::post('/delete_main_texture_sub', 'Admin\TextureController@delete_main_texture_sub_data')->name('delete_main_texture_sub');
    Route::post('/update_main_texture_sub/{id}', 'Admin\TextureController@update_main_texture_sub_data')->name('update_main_texture_sub');

    Route::get('/get_main_texture', 'Admin\TextureController@get_main_texture_data')->name('get_main_texture');

    Route::post('/get_main_texture_sub', 'Admin\TextureController@get_main_texture_sub_data')->name('get_main_texture_sub');
    Route::get('/get_main_texture_sub_all', 'Admin\TextureController@get_main_texture_sub_all_data')->name('get_main_texture_sub_all');

    //Fabric Pattern
    Route::get('/create_fabric_pattern', 'Admin\TextureController@create_fabric_pattern_data')->name('create_fabric_pattern');
    Route::post('/get_sub_data_ajax', 'Admin\TextureController@get_sub_data_ajax_data')->name('get_sub_data_ajax');
    Route::post('/store_fabric_pattern', 'Admin\TextureController@store_fabric_pattern_data')->name('store_fabric_pattern');
    Route::get('/show_fabric_pattern', 'Admin\TextureController@show_fabric_pattern_data')->name('show_fabric_pattern');
    Route::post('/delete_fabric_pattern', 'Admin\TextureController@delete_fabric_pattern_data')->name('delete_fabric_pattern');
    Route::post('/update_fabric_pattern/{id}', 'Admin\TextureController@update_fabric_pattern_data')->name('update_fabric_pattern');


    // Additional
    // Main Additional
    Route::get('/main_additional_list', 'Admin\AdditionalController@show_main_additional_list')->name('main_additional_list');
    Route::get('/add_main_additional', 'Admin\AdditionalController@show_add_main_additional')->name('add_main_additional');
    Route::post('/store_main_additional', 'Admin\AdditionalController@store_main_additional_data')->name('store_main_additional');
    Route::post('/delete_main_additional', 'Admin\AdditionalController@delete_main_additional_data')->name('delete_main_additional');
    Route::post('/update_main_additional/{id}', 'Admin\AdditionalController@update_main_additional_data')->name('update_main_additional');
    //Main Additional SubCategory
    Route::get('/main_additional_sub_list', 'Admin\AdditionalController@show_main_additional_sub_list')->name('main_additional_sub_list');
    Route::get('/add_main_additional_sub', 'Admin\AdditionalController@show_add_main_additional_sub')->name('add_main_additional_sub');
    Route::post('/store_main_additional_sub', 'Admin\AdditionalController@store_main_additional_sub_data')->name('store_main_additional_sub');
    Route::post('/delete_main_additional_sub', 'Admin\AdditionalController@delete_main_additional_sub_data')->name('delete_main_additional_sub');
    Route::post('/update_main_additional_sub/{id}', 'Admin\AdditionalController@update_main_additional_sub_data')->name('update_main_additional_sub');
    //grand additional
    Route::get('/get_main_additional', 'Admin\AdditionalController@get_main_additional_data')->name('get_main_additional');
    Route::post('/get_main_additional_sub', 'Admin\AdditionalController@get_main_additional_sub_data')->name('get_main_additional_sub');
    Route::post('store_additional','Admin\AdditionalController@store_additional');
    Route::get('/add_additional', 'Admin\AdditionalController@create')->name('grand_additional');
    Route::get('/grand_additional_list','Admin\AdditionalController@list')->name('grand_additional_list');
    Route::get('/edit_additional/{id}', 'Admin\AdditionalController@edit_additional_data')->name('edit_additional');
    Route::post('/delete_additional', 'Admin\AdditionalController@delete_additional_data')->name('delete_additional');
    Route::post('/get_edit_additional', 'Admin\AdditionalController@get_edit_additional_data')->name('get_edit_additional');
    Route::post('/store_edit_additional', 'Admin\AdditionalController@store_edit_additional_data')->name('store_edit_additional');


    // Style
    Route::get('/edit_style/{id}', 'Admin\StyleController@edit_style_data')->name('edit_style');
    Route::get('/add_style', 'Admin\StyleController@create')->name('style');
    Route::post('/get_edit_style', 'Admin\StyleController@get_edit_style_data')->name('get_edit_style');
    Route::post('/store_edit_style', 'Admin\StyleController@store_edit_style_data')->name('store_edit_style');
    Route::post('/delete_style', 'Admin\StyleController@delete_style_data')->name('delete_style');
    Route::post('create_style','Admin\StyleController@create_style');
    Route::get('/list_style','Admin\StyleController@list')->name('style_list');
    

    // Color
    Route::get('/edit_color/{id}', 'Admin\ColorController@edit_color_data')->name('edit_color');
    Route::get('/add_color', 'Admin\ColorController@create')->name('color');
    Route::post('/get_edit_color', 'Admin\ColorController@get_edit_color_data')->name('get_edit_color');
    Route::post('/store_edit_color', 'Admin\ColorController@store_edit_color_data')->name('store_edit_color');
    Route::post('/delete_color', 'Admin\ColorController@delete_color_data')->name('delete_color');
    Route::post('create_color','Admin\ColorController@create_color');
    Route::get('/list_color','Admin\ColorController@list')->name('color_list');

    // Size
    Route::get('/edit_size/{id}', 'Admin\SizeController@edit_size_data')->name('edit_size');
    Route::get('/add_size', 'Admin\SizeController@create')->name('size');
    Route::post('/get_edit_size', 'Admin\SizeController@get_edit_size_data')->name('get_edit_size');
    Route::post('/store_edit_size', 'Admin\SizeController@store_edit_size_data')->name('store_edit_size');
    Route::post('/delete_size', 'Admin\SizeController@delete_size_data')->name('delete_size');
    Route::post('create_size','Admin\SizeController@create_size');
    Route::get('/list_size','Admin\SizeController@list')->name('size_list');

    // Customize
    // Top
    Route::get('/show_top_list', 'Admin\TopController@show_list')->name('show_top_list');
    Route::post('/store_top', 'Admin\TopController@store_top_data')->name('store_top');
    Route::get('/edit_top/{id}', 'Admin\TopController@edit_top_data')->name('edit_top');
    Route::get('/add_top', 'Admin\TopController@add_top_data')->name('add_top');
    Route::post('/get_edit_top', 'Admin\TopController@get_edit_top_data')->name('get_edit_top');
    Route::post('/store_edit_top', 'Admin\TopController@store_edit_top_data')->name('store_edit_top');
    Route::post('/delete_top', 'Admin\TopController@delete_top_data')->name('delete_top');
    Route::get('/get_items', 'Admin\TopController@getTops')->name('getTops');
 

    // Pant
    Route::get('/show_pant_list', 'Admin\PantController@show_list')->name('show_pant_list');
    Route::post('/store_pant', 'Admin\PantController@store_pant_data')->name('store_pant');
    Route::get('/edit_pant/{id}', 'Admin\PantController@edit_pant_data')->name('edit_pant');
    Route::get('/add_pant', 'Admin\PantController@add_pant_data')->name('add_pant');
    Route::post('/get_edit_pant', 'Admin\PantController@get_edit_pant_data')->name('get_edit_pant');
    Route::post('/store_edit_pant', 'Admin\PantController@store_edit_pant_data')->name('store_edit_pant');
    Route::post('/delete_pant', 'Admin\PantController@delete_pant_data')->name('delete_pant');

    // Shirt_button
    Route::get('/show_shirt_button_list', 'Admin\Shirt_ButtonController@show_list')->name('show_shirt_button_list');
    Route::post('/store_shirt_button', 'Admin\Shirt_ButtonController@store_shirt_button_data')->name('store_shirt_button');
    Route::get('/edit_shirt_button/{id}', 'Admin\Shirt_ButtonController@edit_shirt_button_data')->name('edit_shirt_button');
    Route::get('/add_shirt_button', 'Admin\Shirt_ButtonController@add_shirt_button_data')->name('add_shirt_button');
    Route::post('/get_edit_shirt_button', 'Admin\Shirt_ButtonController@get_edit_shirt_button_data')->name('get_edit_shirt_button');
    Route::post('/store_edit_shirt_button', 'Admin\Shirt_ButtonController@store_edit_shirt_button_data')->name('store_edit_button');
    Route::post('/delete_shirt_button', 'Admin\Shirt_ButtonController@delete_shirt_button_data')->name('delete_button');


    //shipping
    Route::resource('shippings', 'Admin\ShippingController');

    //favourite
    Route::post('/add_to_cart_grand', 'Admin\AddToCartController@add_cart')->name('add_to_cart_grand');

    // package
    Route::get('/package_list', 'Admin\PackageController@show_package_list')->name('package_list');
    Route::get('/add_package', 'Admin\PackageController@add_package_data')->name('add_package');
    Route::post('/store_package', 'Admin\PackageController@store_package_data')->name('store_package');
    Route::post('/delete_package', 'Admin\PackageController@delete_package_list')->name('delete_package');
    Route::get('/edit_package/{id}', 'Admin\PackageController@edit_package')->name('edit_package');
    Route::post('/update_package/{id}', 'Admin\PackageController@update_package_list')->name('update_package');


    //Customize Category
    Route::get('/customize_category_list', 'Admin\CustomizeCategoryController@show_customize_category_list')->name('customize_category_list');
    Route::get('/add_customize_category', 'Admin\CustomizeCategoryController@add_customize_category_data')->name('add_customize_category');
    Route::post('/store_customize_category', 'Admin\CustomizeCategoryController@store_customize_category_data')->name('store_customize_category');
    Route::get('/edit_customize_cate/{id}', 'Admin\CustomizeCategoryController@edit_customize_cate')->name('edit_customize_cate');
    Route::post('/update_customize_cate_list/{id}', 'Admin\CustomizeCategoryController@update_customize_cate_list')->name('update_customize_cate');

    //Style Category
    Route::get('/style_category_list', 'Admin\Style_CategoryController@show_style_category_list')->name('style_category_list');
    Route::get('/add_style_category', 'Admin\Style_CategoryController@add_style_category_data')->name('add_style_category');
    Route::post('/store_style_category', 'Admin\Style_CategoryController@store_style_category_data')->name('store_style_category');
    Route::get('/edit_style_cate/{id}', 'Admin\Style_CategoryController@edit_style_cate')->name('edit_style_cate');
    Route::post('/update_style_cate_list/{id}', 'Admin\Style_CategoryController@update_style_cate_list')->name('update_style_cate');

    //Jacket Button
    Route::get('/jacket_button_list', 'Admin\Jacket_buttonController@show_jacket_button_list')->name('jacket_button_list');
    Route::get('/add_jacket_button', 'Admin\Jacket_buttonController@add_jacket_button_data')->name('add_jacket_button');
    Route::post('/store_jacket_button', 'Admin\Jacket_buttonController@store_jacket_button_data')->name('store_jacket_button');
    Route::get('/edit_jacket_button/{id}', 'Admin\Jacket_buttonController@edit_jacket_button')->name('edit_jacket_button');
    Route::post('/update_jacket_button_list/{id}', 'Admin\Jacket_buttonController@update_jacket_button_list')->name('update_jacket_button');
    Route::post('/delete_jacket_button', 'Admin\Jacket_buttonController@delete_jacket_button')->name('delete_jacket_button');

    // Vest Lapel
    Route::get('/vest_lapel_list', 'Admin\Vest_lapelController@show_vest_lapel_list')->name('vest_lapel_list');
    Route::get('/add_vest_lapel', 'Admin\Vest_lapelController@add_vest_lapel_data')->name('add_vest_lapel');
    Route::post('/store_vest_lapel', 'Admin\Vest_lapelController@store_vest_lapel_data')->name('store_vest_lapel');
    Route::get('/edit_vest_lapel/{id}', 'Admin\Vest_lapelController@edit_vest_lapel')->name('edit_vest_lapel');
    Route::post('/update_vest_lapel_list/{id}', 'Admin\Vest_lapelController@update_vest_lapel_list')->name('update_vest_lapel');
    Route::post('/delete_vest_lapel', 'Admin\Vest_lapelController@delete_vest_lapel')->name('delete_vest_lapel');

    // Pant Pleat
    Route::get('/pant_pleat_list', 'Admin\Pant_pleatController@show_pant_pleat_list')->name('pant_pleat_list');
    Route::get('/add_pant_pleat', 'Admin\Pant_pleatController@add_pant_pleat_data')->name('add_pant_pleat');
    Route::post('/store_pant_pleat', 'Admin\Pant_pleatController@store_pant_pleat_data')->name('store_pant_pleat');
    Route::get('/edit_pant_pleat/{id}', 'Admin\Pant_pleatController@edit_pant_pleat')->name('edit_pant_pleat');
    Route::post('/update_pant_pleat_list/{id}', 'Admin\Pant_pleatController@update_pant_pleat_list')->name('update_pant_pleat');
    Route::post('/delete_pant_pleat', 'Admin\Pant_pleatController@delete_pant_pleat')->name('delete_pant_pleat');

    // Faq title
    Route::get('/faq_title_list', 'Admin\FaqTitleController@show_faq_title_list')->name('faq_title_list');
    Route::get('/add_faq_title', 'Admin\FaqTitleController@add_faq_title_data')->name('add_faq_title');
    Route::post('/store_faq_title', 'Admin\FaqTitleController@store_faq_title_data')->name('store_faq_title');
    Route::get('/edit_faq_title/{id}', 'Admin\FaqTitleController@edit_faq_title')->name('edit_faq_title');
    Route::post('/update_faq_title_list/{id}', 'Admin\FaqTitleController@update_faq_title_list')->name('update_faq_title');
    Route::post('/delete_faq_title', 'Admin\FaqTitleController@delete_faq_title')->name('delete_faq_title');

    // Faq question
    Route::get('/faq_question_list', 'Admin\FaqQuestionController@show_faq_question_list')->name('faq_question_list');
    Route::get('/add_faq_question', 'Admin\FaqQuestionController@add_faq_question_data')->name('add_faq_question');
    Route::post('/store_faq_question', 'Admin\FaqQuestionController@store_faq_question_data')->name('store_faq_question');
    Route::get('/edit_faq_question/{id}', 'Admin\FaqQuestionController@edit_faq_question')->name('edit_faq_question');
    Route::post('/update_faq_question_list/{id}', 'Admin\FaqQuestionController@update_faq_question_list')->name('update_faq_question');
    Route::post('/delete_faq_question', 'Admin\FaqQuestionController@delete_faq_question')->name('delete_faq_question');

    // Faq
    Route::get('/faq_list', 'Admin\FaqController@show_faq_list')->name('faq_list');
    Route::get('/add_faq', 'Admin\FaqController@add_faq_data')->name('add_faq');
    Route::post('/store_faq', 'Admin\FaqController@store_faq_data')->name('store_faq');
    Route::get('/edit_faq/{id}', 'Admin\FaqController@edit_faq')->name('edit_faq');
    Route::post('/update_faq_list/{id}', 'Admin\FaqController@update_faq_list')->name('update_faq');
    Route::post('/delete_faq', 'Admin\FaqController@delete_faq')->name('delete_faq');

    // Suit Tip
    Route::get('/suit_tip_list', 'Admin\SuitTipsController@show_suit_tip_list')->name('suit_tip_list');
    Route::get('/add_suit_tip', 'Admin\SuitTipsController@add_suit_tip_data')->name('add_suit_tip');
    Route::post('/store_suit_tip', 'Admin\SuitTipsController@store_suit_tip_data')->name('store_suit_tip');
    Route::get('/edit_suit_tip/{id}', 'Admin\SuitTipsController@edit_suit_tip')->name('edit_suit_tip');
    Route::post('/update_suit_tip_list/{id}', 'Admin\SuitTipsController@update_suit_tip_list')->name('update_suit_tip');
    Route::post('/delete_suit_tip', 'Admin\SuitTipsController@delete_suit_tip')->name('delete_suit_tip');

    Route::post('/delete_style_category', 'Admin\Style_CategoryController@delete_style_cate')->name('delete_style_category');
    //Measurement
    Route::get('/personal_info_list', 'Admin\MeasurementController@show_personal_info_list')->name('personal_info_list');
    Route::get('/upper_measure_list', 'Admin\MeasurementController@show_upper_measure_list')->name('upper_measure_list');
    Route::get('/lower_measure_list', 'Admin\MeasurementController@show_lower_measure_list')->name('lower_measure_list');
    //update
    Route::post('/update_lower_measure/{id}', 'Admin\MeasurementController@update_lower_measure_list')->name('update_lower_measure');
    Route::post('/update_upper_measure/{id}', 'Admin\MeasurementController@update_upper_measure_list')->name('update_upper_measure');
    Route::post('/update_user_info_measure/{id}', 'Admin\MeasurementController@update_userinfo_measure_list')->name('update_user_info_measure');


    //delete
    Route::post('/delete_lower', 'Admin\MeasurementController@delete_lower_measure_list')->name('delete_lower');
    Route::post('/delete_upper', 'Admin\MeasurementController@delete_upper_measure_list')->name('delete_upper');
    Route::post('/delete_personalInfo','Admin\MeasurementController@delete_personalInfo_list')->name('delete_personalInfo');

    //payment
    Route::get('customer/orders','Admin\PaymentController@index')->name('payment_list');
    Route::get('customer/order/detail/{id}','Admin\PaymentController@order_detail')->name('order.detail');
    Route::put('customer/order/update/{id}','Admin\PaymentController@order_deleivery_update')->name('order.delivery.update');

   


});
?>
