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

Route::get('/admin', function () {

    session(['user_type' => 'admin']);

    $user_type = session('user_type', 'visitor');

    return view('admin.index');
});

Route::get('/visitor', function () {

    session(['user_type' => 'visitor']);

    $user_type = session('user_type', 'visitor');

    return view('visitor.options');
});

Route::get('/article/list_published', function () {

    return view('visitor.list_published_articles');
});

Route::get('/article/filter_articles', function () {

    return view('visitor.filter_articles');
});

Route::get('/api/articles', 'ApiController@getAllArticles');
Route::get('/api/categories', 'ApiController@getAllCategories');
Route::get('/api/comments', 'ApiController@getAllComments');

Route::post('/api/article/{id}/comment/{text}', 'ApiController@setArticleComment');
Route::get('/api/category/{id}/articles', 'ApiController@getArticlesByCategoryID');

Route::resource('article', 'ArticleController');
