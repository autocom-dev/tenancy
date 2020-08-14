<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
]);

Route::get('/', 'Tenant\TenantController@index')->name('tenant');
Route::get('companies', 'Tenant\CompanyController@index')->name('company.index');
Route::get('company/create', 'Tenant\CompanyController@create')->name('company.create');
Route::post('company', 'Tenant\CompanyController@store')->name('company.store');
Route::get('company/{domain}', 'Tenant\CompanyController@show')->name('company.show');
Route::get('company/edit/{domain}', 'Tenant\CompanyController@edit')->name('company.edit');
Route::put('company/{id}', 'Tenant\CompanyController@update')->name('company.update');
Route::delete('company/{id}', 'Tenant\CompanyController@destroy')->name('company.destroy');

