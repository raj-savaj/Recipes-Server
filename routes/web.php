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
Route::get('/Menu', "Home@menu");
Route::get('/delete/{id}', "Home@deletemenu");
Route::get("/UpdateMenu/{id}","Home@UpdateMenuGet");

Route::post("SaveMenu","Home@SaveMenu");
Route::post("UpdateMenu","Home@UpdateMenu");

Route::get('/submenu',"Home@Submenu");

Route::get("/Recipes","Home@getRecipes");
Route::get('/showrecipe', "Home@showrecipe");
Route::get('/getRecipeContent',"Home@getRecipeContent");

Route::post("savesubmenu","Home@savesubmenu");
Route::post("updatesubmenu","Home@updatesubmenu");
Route::get('/deleterecipe/{id}', "Home@deleterecipe");

Route::get('/updaterecipes/{id}', "Home@updaterecipes");
Route::get("login",function(){
    return view("login");
});

