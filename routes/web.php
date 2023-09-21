<?php

use App\Http\Controllers\authcontroller;
use App\Http\Controllers\postController;
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

Route::post(
    '/login-user',
    [AuthController::class, 'loginUser']
)->name('login-user');

Route::get('/logout', [authController::class, 'logout']);

// 
// 
// 
// 

Route::get('/dashboard', [authcontroller::class, 'Userdashboard']);

Route::get(
    '/createPost',
    [postController::class, 'posts']
);

Route::post('/create-post', [
    postController::class,
    'create_post'
])->name('create-post');


Route::get('/profile', function () {
    return view('profile.profile');
});



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