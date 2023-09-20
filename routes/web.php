<?php

use App\Http\Controllers\authcontroller;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
Route::post('/register-user', [
    authcontroller::class,
    'registerUser'
])->name('register-user');


// Route::get('/', function () {
//     return view(
//         'listings',
//         [
//             'heading' => 'Latest Listings',
//             'listings' => Listing::all()
//         ]
//     );
// });

Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing' => $listing
    ]);
});