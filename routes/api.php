<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\UserController;
use App\Http\Controller\buscontroller;
use App\Http\Controller\RouteController;
use App\Http\Controller\seatController;
use App\Http\Controller\busrouteController;
use App\Http\Controller\busScheduleController;
use App\Http\Controller\bookingController;
use App\http\Controller\ForgotPasswordController;


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

//user details new-user register or login  
Route::post('register','UserController@register'); 
Route::post('login','UserController@login');

//sanctum Authentication
Route::middleware(['auth:sanctum'])->group(function (){

//logout
Route::post('logout','UserController@logout');  

//see the user details by using token
Route::get('getuser','UserController@getuser');

//booking Control
Route::post('add-booking','bookingController@AddBooking');
Route::delete('cancle-booking/{id}','bookingController@CancleBooking');
Route::get('book-schedule','bookingController@book');
Route::get('mybook/{id}','bookingController@mybook');

//bus details
Route::post('addbus','buscontroller@AddBus');
Route::put('updatebus','buscontroller@update');
Route::delete('deletebus/{id}','buscontroller@DeleteBusDetails');

//Routes Details add 
Route::post('add-route','RouteController@AddRoute');
Route::put('update-route','RouteController@ModifyRoute');
Route::delete('delete-route/{id}','RouteController@DeleteRoute');

//bus route 
Route::post('add-busroute','busrouteController@Route');
Route::put('update-busroute','busrouteController@UpdateStatus');
Route::Delete('del-busroute/{id}','busrouteController@DeleteRoute');

//bus Shedule control
Route::post('add-schedule','busScheduleController@AddSchedule');
Route::put('update-schedule','busScheduleController@UpdateSchedule');
Route::Delete('del-schedule/{id}','busScheduleController@DeleteSchedule');
Route::get('schedule-list','busScheduleController@show');

//bus seat Control    
Route::post('add-seat','seatController@AddSeat');
Route::put('update-seat','seatController@UpdateSeat');
Route::Delete('del-seat/{id}','seatController@DeleteSeat');
});

//reset Password by using an email
Route::post('forget-password','ForgotPasswordController@forgotPassword');
Route::post('reset-password','ForgotPasswordController@reset');
 


