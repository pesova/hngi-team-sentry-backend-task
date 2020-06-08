<?php

use App\Http\Controllers\PagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// end point to add a page
Route::post('add_page', 'PagesController@set_page_markdown');
// end point to set a page markdown
Route::put('set_page_markdown', 'PagesController@set_page_markdowm');
// this endpoint will take care of retrieving the html format of the markdown file
Route::get('retrieve_page_html', 'PagesController@retrieve_page_html');

Route::get('test', 'PagesController@test');
