<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
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

Route::get('/', [PostController::class, 'index']);

Route::get('/post/{post:id}', [PostController::class, 'show']);

Route::get('admin/post/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/post/create', [PostController::class, 'store'])->middleware('admin');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/sessions', [SessionController::class, 'login'])->middleware('guest');

Route::post('/comment', [CommentController::class, 'store'])->middleware('auth');


//Route::get('/categories/{category:name}', function (Category $category) {
//    return view('posts', ['posts' => $category->posts]);
//});


Route::post('newsletter', function () {
    request()->validate(['email' => 'required|email']);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    try {
        $response = $mailchimp->lists->addListMember("74c20aff63", [
            'email_address' => request('email'),
            'status' => 'subscribed',
        ]);
    } catch (Exception $e) {
        \Illuminate\Validation\ValidationException::withMessages(
            ['email', 'cant subscribe']
        );
    }

    return redirect('/')
        ->with('success', 'subscribed!');
});

Route::get('/test', function() {
//    dd(Post::first());
    $api_key = config('services.weather.key');
    $test = \Illuminate\Support\Facades\Http::post('https://api.openweathermap.org/data/2.5/weather?id='. $api_key .'&mode=xml');

    $test = \Illuminate\Support\Facades\Http::post('https://boardgamegeek.com/xmlapi/collection/ruaknight');

    $xml = simplexml_load_string($test);
    $json = json_encode($xml, JSON_FORCE_OBJECT);
    $array = json_decode($json);

    dd($array);

//    dd($array->city->{'@attributes'}->id);
} );
