<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

Route::resources(
    [
        'cities' => 'CityController',
        'professions' => 'ProfessionController',
        'facilities' => 'FacilityController',
        'features' => 'FeatureController',
        'properties' => 'PropertyController',
        'local-contacts' => 'LocalContactController',
        'profile' => 'ProfileController',
    ]
);

Route::get('property-images/{property_id}', 'PropertyImageController@index')->name('property-images.index');
Route::post('property-images', 'PropertyImageController@store')->name('property-images.store');
Route::delete('property-images/{propertyImage}', 'PropertyImageController@destroy')->name('property-images.destroy');
Route::get('contact', 'ContactController@index')->name('contact.index');
Route::delete('contact/{contact}', 'ContactController@destroy')->name('contact.destroy');
Route::put('properties','PropertyController@search')->name('property-search');
Route::put('local-contacts','LocalContactController@search')->name('localcontact-search');
Route::get('users','UserController@index')->name('users.index');
Route::delete('users/destroy/{user}','UserController@destroy')->name('users.destroy');
Route::get('users/change-password/{user}','UserController@changePasswordShow')->name('users.change-password.show');
Route::post('users/change-password/{user}','UserController@changePassword')->name('users.change-password');
Route::get('users/change-role/{user}','UserController@changeRoleShow')->name('users.change-role.show');
Route::post('users/change-role/{user}','UserController@changeRole')->name('users.change-role');


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('system.logs');
