<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Services\Boardgamegeek;
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

Route::get('/admin/posts', [PostController::class, 'indexAdmin'])->middleware('admin');
Route::get('/admin/post/{post:id}/edit', [PostController::class, 'edit'])->middleware('admin');
Route::patch('/admin/post/{post:id}', [PostController::class, 'update'])->middleware('admin');
Route::delete('/admin/post/{post:id}', [PostController::class, 'destroy'])->middleware('admin');

Route::get('/admin/post/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/admin/post/create', [PostController::class, 'store'])->middleware('auth');

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

Route::get('/test/{id:id}', function(String $id, Boardgamegeek $bg) {
    return $bg->getInfo($bg->gameUrlBuilder($id));
//    dd($array->city->{'@attributes'}->id);
} );

Route::get('bggHot', function(Boardgamegeek $bg) {
    return $bg->getHotItems();
});
