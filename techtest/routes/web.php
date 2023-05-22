<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organizer;
use App\Http\Controllers\Event;
use App\Http\Controllers\User;

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

Route::get('/dashboard', function () {
    if (session()->has('tokenApi')) {
        // {"id":1970,"firstName":"ICHO","lastName":"ISHAMASHI","email":"icho@gmail.com"}
        return view('home', [
            "title" => "HOME"
        ]);
    }
    return redirect('/login');
});

// ORGANIZER
Route::get('/organizer', [Organizer::class, 'index']);
Route::post('/organizer', [Organizer::class, 'add']);

Route::get('/organizer/last_id/{id}', [Organizer::class, 'index']);
Route::get('/organizer/delete/{id}',[Organizer::class, 'delete']);
Route::get('/organizer/edit/{id}',[Organizer::class, 'edit']);

// SPORT EVENT
Route::get('/sport-events', [Event::class, 'index']);
Route::post('/sport-events', [Event::class, 'add']);

Route::get('/sport-events/last_id/{id}', [Event::class, 'index']);
Route::get('/sport-events/delete/{id}',[Event::class, 'delete']);
Route::get('/sport-events/edit/{id}',[Event::class, 'edit']);

// LOGIN
Route::get('/login', [User::class, 'login']);
Route::post('/login', [User::class, 'add']);
Route::post('/logout', [User::class, 'logout']);

// REGISTER
Route::get('/register', [User::class, 'register']);
Route::post('/register', [User::class, 'add']);

// USER
Route::get('/user', [User::class, 'index']);
Route::post('/user', [User::class, 'editUser']);
Route::get('/user/edit/{id}',[User::class, 'edit']);



// Route::get('/user', function () {
//     $response = Http::GET('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/sport-events', [
//         'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLXNwb3J0LWV2ZW50cy5waHA2LTAyLnRlc3Qudm94dGVuZW8uY29tXC9hcGlcL3YxXC91c2Vyc1wvbG9naW4iLCJpYXQiOjE2ODQ2NDI4NDksImV4cCI6MTY4NDcyOTI0OSwibmJmIjoxNjg0NjQyODQ5LCJqdGkiOiJkR29Ra2NFem8zaTNaV2V1Iiwic3ViIjoxOTcwLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.m92Ei-Cf2_ne7vn2_0HSa5h9EqUVk1ssNKBefFJFYgk',
//     ]);
//     return view('user', [
//         "title" => "USER",
//         "datas" => $response['data']
//     ]);
// });

// Route::get('/login', function () {
//     $response = Http::post('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/login', [
//         'email' => 'icho@gmail.com',
//         'password' => 'Pass@w0rd',
//     ]);

//     // {"id":1970,"email":"icho@gmail.com","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLXNwb3J0LWV2ZW50cy5waHA2LTAyLnRlc3Qudm94dGVuZW8uY29tXC9hcGlcL3YxXC91c2Vyc1wvbG9naW4iLCJpYXQiOjE2ODQ2NDI4NDksImV4cCI6MTY4NDcyOTI0OSwibmJmIjoxNjg0NjQyODQ5LCJqdGkiOiJkR29Ra2NFem8zaTNaV2V1Iiwic3ViIjoxOTcwLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.m92Ei-Cf2_ne7vn2_0HSa5h9EqUVk1ssNKBefFJFYgk"}
//     // $response->body(): "nama";
//     return $response;
// });
Route::get('/getUser', function () {
    $response = Http::get('https://api-sport-events.php6-02.test.voxteneo.com/api/v1/users/1970', [
        'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLXNwb3J0LWV2ZW50cy5waHA2LTAyLnRlc3Qudm94dGVuZW8uY29tXC9hcGlcL3YxXC91c2Vyc1wvbG9naW4iLCJpYXQiOjE2ODQ2NDI4NDksImV4cCI6MTY4NDcyOTI0OSwibmJmIjoxNjg0NjQyODQ5LCJqdGkiOiJkR29Ra2NFem8zaTNaV2V1Iiwic3ViIjoxOTcwLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.m92Ei-Cf2_ne7vn2_0HSa5h9EqUVk1ssNKBefFJFYgk',
    ]);

    // {"id":1970,"email":"icho@gmail.com","token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLXNwb3J0LWV2ZW50cy5waHA2LTAyLnRlc3Qudm94dGVuZW8uY29tXC9hcGlcL3YxXC91c2Vyc1wvbG9naW4iLCJpYXQiOjE2ODQ2NDI4NDksImV4cCI6MTY4NDcyOTI0OSwibmJmIjoxNjg0NjQyODQ5LCJqdGkiOiJkR29Ra2NFem8zaTNaV2V1Iiwic3ViIjoxOTcwLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.m92Ei-Cf2_ne7vn2_0HSa5h9EqUVk1ssNKBefFJFYgk"}
    // $response->body(): "nama";
    return $response;
});
