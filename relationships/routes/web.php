<?php

use Illuminate\Support\Facades\Route;
use App\Models\User; // another way of creating the fake users - Not recommended

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

Route::get('/user',function(){
// User::factory()->count(2)->create(); // another way of creating the fake users - Not recommended
$users = User::all();
return view('index',compact('users'));
});
