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


Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back();
});


Route::get('/apptest', function() {
    //dd(app());
    return "Radi!";
});


Route::get('/langtest', function () {
    return view('langtest.langtest');
});



Route::get('/sliders', function () {
    return view('sliders.sliders');
});


Route::get('/navbars', function () {
    return view('navbars.navbars');
});

Route::get('/people', function () {

        $people = App\Person::all();

        dd($people);

});



Route::get('/people/{person}', function (App\Person $person) {

        //dd($person);

        echo $person->active;

});




// Route::get('/contact', function(){
//     return view('contact.contactform');

// });
Route::view('/contact', 'contact.create');

Route::post('/contact', 'ContactController@store');
