<?php

use Illuminate\Support\Facades\Route;
use App\Models\User; // another way of creating the fake users - Not recommended

use App\Http\Controllers\PostController;

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

// 29 queries
// runs below query for number of users
// select * from `phones` where `phones`.`user_id` = 1 and `phones`.`user_id` is not null limit 1
//$users = User::all();

// Eager loading -  2 queries 
// select * from `users`
// select * from `phones` where `phones`.`user_id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28)

$users = User::with('phone')->get();
return view('index',compact('users'));
});


Route::get('/phone',function(){
// Manually inserting data into Phone
\App\Models\Phone::create([
    'user_id'=>5,
    'name'=>'blackberry'
]);
});

// One to Many
Route::get('/add-post',[PostController::class,'addPost']);
Route::get('/add-comment/{id}',[PostController::class,'addComment']);