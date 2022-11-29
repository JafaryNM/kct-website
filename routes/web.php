<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();
    
    // customers
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('customers/login','HomeController@customersLogin');
    Route::get('customers/register', 'HomeController@customerRegister');
    Route::get('customers/forget_password', 'HomeController@customerForgetPassword');
    Route::get('customers/product_details/{id}','HomeController@productDetails');
    Route::post('customers/signup','Auth\RegisterController@customerSignUp')->name('customer.signup');
    Route::post('customers/signin','Auth\LoginController@SignIn')->name('customers.signin');
    Route::get('customers/profile','Profile\CustomersProfileController@customersProfile')->name('customers.profile');
    Route::get('customers/logout', 'Auth\LoginController@logoutCustomer')->name('customers.logout');
    Route::get('customers/searchby_categories/{id}','HomeController@searchByCategory');
    Route::get('customers/send_mail/{id}','HomeController@invoiceEmail');

    // customers inquiries
    Route::post('customers/create_inquiry', 'HomeController@createEnquiry')->name('customers.createEnquiry');
    Route::get('customers/get_inqueries', 'Profile\CustomersProfileController@getInquiry');
    Route::get('customers/delete_inquiry/{id}', 'Profile\CustomersProfileController@deleteInquiry');
    Route::get('customers/view_invoice/{id}', 'Profile\CustomersProfileController@viewInvoice');

    // customers invoice
    Route::post('customers/create_ivoice', 'HomeController@createInvoice')->name('customers.createInvoice');
    Route::get('customers/delete_invoice/{id}', 'Profile\CustomersProfileController@deleteInvoice');
    Route::get('customers/attachment_view/{id}','Profile\CustomersProfileController@attachmentView');
    Route::post('customers/attachment_save/{id}','Profile\CustomersProfileController@attachmentSave')->name('attachment.save');

    
    
    // admins
    Route::get('admins/dashboard', 'Admins\AdminsController@dashboard')->name('admins.dashboard');
    Route::get('admins/login', 'Admins\AdminsController@loginPage')->name('admins.loginPage');
    Route::get('admins/register', 'Admins\AdminsController@registerPage')->name('admins.registerPage');
    Route::get('admins/forget_password', 'Admins\AdminsController@forgetPage');
    Route::post('admins/register_user', 'Admins\AdminsController@registerUser')->name('admins.registerUser');
    Route::post('admins/login_user', 'Admins\AdminsController@loginUser')->name('admins.loginUser');
    Route::get('admins/logout', 'Admins\AdminsController@logout')->name('admins.logout');
    Route::get('admins/admin_list', 'Admins\AdminsController@adminList')->name('admins.adminList');
    Route::get('admins/edit/{id}', 'Admins\AdminsController@update');
    Route::post('admins/save_update/{id}', 'Admins\AdminsController@saveAdminUpdate')->name('saveAdminUpdate');
    Route::get('admins/delete/{id}', 'Admins\AdminsController@adminDelete');

    // products
    Route::get('admins/products_list', 'Products\ProductsController@productsList')->name('admins.productsList');
    Route::post('admins/product_save', 'Products\ProductsController@productSave')->name('product.save');
    Route::get('admins/product/delete/{id}', 'Products\ProductsController@deleteProducts');
    Route::get('admins/product/view/{id}', 'Products\ProductsController@viewProduct');
    Route::get('admins/product/edit/{id}', 'Products\ProductsController@updateProduct');
    Route::post('admins/product_store_update/{id}', 'Products\ProductsController@productStoreUpdate')->name('productUpdate.store');
    
    

    // categories
    Route::post('admins/register_category', 'Products\ProductsController@registerCategory')->name('category.register');
    Route::get('admins/category/edit/{id}', 'Products\ProductsController@updateCategory');
    Route::post('admins/category_save/{id}', 'Products\ProductsController@saveCategory')->name('categories.saveUpdate');
    Route::get('admins/category/delete/{id}', 'Products\ProductsController@deleteCategory');


    // transmition
    Route::post('admins/register_transmition', 'Products\ProductsController@registerTransmition')->name('transmition.register');
    Route::get('admins/transmition/edit/{id}', 'Products\ProductsController@updateTransmition');
    Route::post('admins/transmition_save/{id}','Products\ProductsController@saveTransmition')->name('transmition.saveUpdate');
    Route::get('admins/transmition/delete/{id}', 'Products\ProductsController@deleteTransmition');


    // fuel type
    Route::post('admins/register_fueltype', 'Products\ProductsController@registerFuelType')->name('fuel.register');
    Route::get('admins/fueltype/edit/{id}', 'Products\ProductsController@updateFuel');
    Route::post('admins/fueltype/{id}', 'Products\ProductsController@saveFuelType')->name('fuel.saveUpdate');
    Route::get('admins/fueltype/delete/{id}', 'Products\ProductsController@deleteFuelType');

    // features
    Route::post('admins/features','Products\ProductsController@registerFeatures')->name('features.resgister');
    Route::get('admins/features/edit/{id}', 'Products\ProductsController@updateFeatures');
    Route::post('admins/features/{id}', 'Products\ProductsController@saveFeatures')->name('features.saveUpdate');
    Route::get('admins/features/delete/{id}', 'Products\ProductsController@deleteFeatures');

    // image
    Route::post('admins/images','Products\ProductsController@uploadImage')->name('images.upload');
    Route::get('admins/images/delete/{id}', 'Products\ProductsController@deleteImage');

    // years
    Route::post('admins/years', 'Products\ProductsController@registerYears')->name('years.register');
    Route::get('admins/years/edit/{id}','Products\ProductsController@yearsEdit');
    Route::get('admins/years/delete/{id}', 'Products\ProductsController@deleteYear')->name('year.delete');

    // product Type
    Route::post('admins/productTypes', 'Products\ProductsController@registerProductType')->name('productType.register');
    Route::get('admins/types/edit/{id}','Products\ProductsController@registerUpdateProductType');
    Route::post('admins/product_product_types/{id}', 'Products\ProductsController@saveProductType')->name('productType.save');
    Route::get('admins/types/delete/{id}', 'Products\ProductsController@deleteProductType');

    // product condition
    Route::post('admins/conditions', 'Products\ProductsController@registerConditions')->name('conditions.register');
    Route::get('admins/conditions/edit/{id}', 'Products\ProductsController@updateConditions');
    Route::post('admins/save_condtions/{id}', 'Products\ProductsController@saveConditions')->name('conditions.save');
    Route::get('admins/conditions/delete/{id}', 'Products\ProductsController@deleteCondition');

    // vehicles color
    Route::post('admins/vehicle_colors', 'Products\ProductsController@registerColors')->name('colors.register');
    Route::get('admins/colors/edit/{id}', 'Products\ProductsController@updateColors');
    Route::post('admins/save_colors/{id}', 'Products\ProductsController@saveColors')->name('colors.save');
    Route::get('admins/colors/delete/{id}', 'Products\ProductsController@deleteColors');


    // invoices list
    Route::get('admins/invoice_lists','Products\ProductsController@invoiceLists')->name('invoices.list');
    Route::get('admins/invoice_view/{id}','Products\ProductsController@viewInvoice')->name('invoice.view');
    Route::get('admins/invoice_delete/{id}','Products\ProductsController@deleteInvoice');
    Route::get('admins/inquiry_view/{id}', 'Products\ProductsController@inquiryView');
    Route::get('admins/inquiry_delete/{id}', 'Products\ProductsController@deleteInquiry');

    Route::post('admins/steering','Products\ProductsController@registerSteering')->name('steering.register');
    Route::get('admins/steering/edit/{id}','Products\ProductsController@updateSteering');
    Route::post('admins/save_steering/{id}', 'Products\ProductsController@saveSteering')->name('steering.save');
    Route::get('admins/steering/delete/{id}','Products\ProductsController@deleteSteering');
    
});


