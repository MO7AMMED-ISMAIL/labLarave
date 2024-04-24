<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Controllers\Api\PostController;
// use App\Http\Controllers\Auth;
use App\Http\Controllers\API\SocialAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});


//Route::put('/posts/{id}', [PostController::class, 'update']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('posts', PostController::class);
});



Route::group(['prefix' => 'auth'], function () {
    Route::get('/github/redirect', [SocialAuthController::class, 'redirectToGithub']);
    Route::get('/github/callback', [SocialAuthController::class, 'handleGithubCallback']);
});


