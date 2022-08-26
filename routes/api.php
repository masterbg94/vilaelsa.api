<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Building routes

Route::get('/buildings', 'BuildingController@getAll');
Route::get('/buildings/{id}', 'BuildingController@getById');

//Types routes

Route::get('/types', 'TypeController@getAll');
Route::get('/types/{id}', 'TypeController@getById');
Route::get('/buildings/{buildingId}/types', 'TypeController@getAllByBuilding');

//Floors routes

Route::get('/floors', 'FloorController@getAll');
Route::get('/floors/{id}', 'FloorController@getById');
Route::get('/buildings/{buildingId}/floors', 'FloorController@getAllByBuilding');

//Apartments routes

Route::get('/apartments', 'ApartmentController@getAll');
Route::get('/apartments/random', 'ApartmentController@apartmentsRandom');
Route::get('/apartments/{id}', 'ApartmentController@getById');
Route::get('/buildings/{buildingId}/apartments', 'ApartmentController@getAllByBuilding');
Route::get('/buildings/{buildingId}/premises', 'ApartmentController@getPremisesByBuilding');
Route::get('/types/{typeId}/apartments', 'ApartmentController@getAllByType');
Route::get('/floors/{floorId}/apartments', 'ApartmentController@getAllByFloor');

//Update Apartment Status

Route::post('/update/{apartmentId}', 'ApartmentController@updateApartment');

// Rooms routes

Route::get('/rooms', 'RoomController@getAll');
Route::get('/types/{typeId}/rooms', 'RoomController@getAllByType');

// Garage routes

Route::get('/garages', 'GarageController@getAll');
Route::get('/garages/{id}', 'GarageController@getById');
Route::get('/buildings/{buildingId}/garages', 'GarageController@getAllByBuilding');
