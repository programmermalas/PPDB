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

            Route::post('detail', 'Registrant\DetailController@store')->name('detail.store');
            Route::get('detail', 'Registrant\DetailController@index')->name('detail.index');

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
        });
    });
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::resource('user', 'Admin\UserController');
            Route::post('user/show', 'Admin\UserController@show')->name('user.show');
        });
    });
});
