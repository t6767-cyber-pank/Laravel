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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/', "IndexController@index")->name('index');
Route::get('/agency', "IndexController@agency")->name('agency');
Route::get('/allWeCan', "IndexController@allWeCanAll")->name('allWeCanAll');
Route::get('/blog', "IndexController@blog")->name('blog');
Route::get('/blog/{post}', "IndexController@blogPost")->name('blogPost');
Route::get('/Portfolio', "IndexController@allPortfolio")->name('allPortfolio');
Route::get('/Portfolio/{post}', "IndexController@weCanAbout")->name('allWeCanPost');
Route::get('/rewiews', "IndexController@rewues")->name('rewues');
Route::get('/search', "IndexController@search")->name('search');
Route::get('/searchbytag', "IndexController@searchbytag")->name('search-by-tag');
Route::get('/vacancy', "IndexController@vacancy")->name('vacancy');
Route::get('/vacancy/{id}', "IndexController@singleVacancy")->name('singleVacancy');
Route::get('/sendAllPodpiska', "IndexController@sendAllPodpiska")->name('sendAllPodpiska');
Route::get('/otpiska/{id}', "IndexController@otpiska")->name('otpiska');
Route::post('/', 'IndexController@applyForm')->name('formas');
Route::post('/vacancy', 'IndexController@applyVacancyForm')->name('formasVac');
Route::post('/ajaxRequest', 'IndexController@ajaxRequestPost');
Route::post('/ajaxRequestPostBlog', 'IndexController@ajaxRequestPostBlog');
Route::post('/ajaxRequestRewues', 'IndexController@ajaxRequestRewues');
Route::post('/form', 'IndexController@storeSecondForm')->name('SecFormas');
Route::post('/ajaxRequestPodpiska', 'IndexController@ajaxRequestPodpiska')->name('Podpiska');
