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

   
/* Auth */
Auth::routes(['register' => false]);

/* Dashboard */
Route::group(['middleware'=>'auth'], function(){
        Route::get('/dashboard', function () {return view('dashboard.home');})->name('dashboard');
        Route::resources([
            'dashboard/pages' => 'PageController',
            'dashboard/metatags' => 'MetatagController',
            'dashboard/urlwords' => 'UrlwordController',
            'dashboard/urlwords_category' => 'UrlwordCategoryController',
            'dashboard/keywords' => 'KeywordController',
            'dashboard/keywords_category' => 'KeywordCategoryController',
            'dashboard/posts'  => 'PostController',
        ]);
        
            /*landings*/
        Route::get('/dashboard/landings', 'PageController@landings' )->name('landings');
        Route::post('/dashboard/landings/add', 'KeywordController@add_landings' )->name('add.landings');
        Route::post('/dashboard/landings/add-images', 'KeywordController@add_landing_images' )->name('add.landing.images');

            /*keywords*/
        Route::post('/dashboard/keywords/{page}/update', 'PageController@keywords_update')->name('keywords.update');
        Route::post('/dashboard/keywords/{page}/remove', 'PageController@keywords_remove' )->name('keywords.remove');
        Route::post('/dashboard/keywords/{page}/delete', 'PageController@keywords_delete' )->name('keywords.delete');

            /* templates */
        Route::post('/dashboard/templates/{page}/create', 'TemplateController@store' )->name('templates.create');
        Route::put('/dashboard/templates/{id}/update', 'TemplateController@update' )->name('templates.update');
            /* content */
        Route::put('/dashboard/content/{page}/update', 'PageController@content_update' )->name('content.update');
            /* grid editor */
        Route::get('/dashboard/editor/{page}', 'PageController@grid_editor' )->name('grid.view');

            /* urlword mixer */
            Route::post('/dashboard/mixer/urlwords', 'UrlwordController@mixer' )->name('urlwords.mixer');            

            /*media*/
        Route::get('/dashboard/media/', 'MediaController@create')->name('create.media');
        // store 
        Route::post('/dashboard/media/upload', 'MediaController@store')->name('store.media');
        // update 
        Route::put('/dashboard/media/{media}/update', 'MediaController@update' )->name('update.media');
        // remove 
        Route::delete('/dashboard/media/{media}/remove', 'MediaController@destroy')->name('remove.media');
});

        /* Other */

/* Mail routes */
Route::post('/contact/send-mail', 'ContactFormController@store')->name('send.mail');    
//Route::post('/contact/callback', 'ContactFormController@callback')->name('callback');    
Route::post('/contact/subscribe', 'ContactFormController@subscribe')->name('subscribe'); 

/* Download brochure' */
Route::get('/brochure', function () {
   // $path = public_path('themes/greece/brochure-for-greece-citizenship.pdf');
    //return response()->download($path);
    return response()->back();
})->name('brochure');    

/* Sitemap */
Route::get('/sitemap', 'HomeController@sitemap')->name('generate.sitemap');
Route::get('/sitemap.xml', 'HomeController@sitemap')->name('sitemap.xml');

/* Front routes */
Route::get('/', 'FrontController@get_home_page')->name('welcome');    
Route::get('/news/{article?}', 'FrontController@get_articles')->name('articles');    
Route::get('/contact-us', 'HomeController@contact')->name('contact');    
Route::get('/{slug}', 'FrontController@get_page')->name('main');
Route::get('/{category}/{slug}', 'FrontController@get_category_page')->name('category');




