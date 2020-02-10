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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register'  => false,
    'verify'    => false,
    'reset'     => false,
]);

Route::group(['middleware'  => ['role:admin|registrant']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middlewaer' => ['role:registrant']], function () {
    Route::prefix('registrant')->group(function () {
        Route::name('registrant.')->group(function () {
            Route::post('registration', 'Registrant\RegistrationController@store')->name('registration.store');
            Route::get('registration', 'Registrant\RegistrationController@index')->name('registration.index');

            Route::post('personal', 'Registrant\PersonalController@store')->name('personal.store');
            Route::get('personal', 'Registrant\PersonalController@index')->name('personal.index');

            Route::post('address', 'Registrant\AddressController@store')->name('address.store');
            Route::get('address', 'Registrant\AddressController@index')->name('address.index');

            Route::post('father', 'Registrant\FatherController@store')->name('father.store');
            Route::get('father', 'Registrant\FatherController@index')->name('father.index');

            Route::post('mother', 'Registrant\MotherController@store')->name('mother.store');
            Route::get('mother', 'Registrant\MotherController@index')->name('mother.index');

            Route::post('guardian', 'Registrant\GuardianController@store')->name('guardian.store');
            Route::get('guardian', 'Registrant\GuardianController@index')->name('guardian.index');

            Route::post('priodic', 'Registrant\PriodicController@store')->name('priodic.store');
            Route::get('priodic', 'Registrant\PriodicController@index')->name('priodic.index');

            Route::post('cost', 'Registrant\CostController@store')->name('cost.store');
            Route::get('cost', 'Registrant\CostController@index')->name('cost.index');

            Route::get('cost/total', 'Registrant\TotalController@index')->name('cost.total.index');
        });
    });
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::resource('user', 'Admin\UserController');
            Route::post('user/show', 'Admin\UserController@show')->name('user.show');
            Route::get('user/{user}/print', 'Admin\UserController@print')->name('user.print');
            
            Route::get('student/export', 'Admin\StudentController@export')->name('student.export');
            Route::get('student', 'Admin\StudentController@index')->name('student.index');
            Route::post('student/show', 'Admin\StudentController@show')->name('student.show');
            Route::get('student/{registration}', 'Admin\StudentController@edit')->name('student.edit');
            Route::post('student/{registration}', 'Admin\StudentController@update')->name('student.update');
            Route::get('student/{registration}/print', 'Admin\StudentController@print')->name('student.print');
        });
    });
});
