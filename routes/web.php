<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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
    return view('welcome');
});


// controller Route

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');

Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show')->where('id','[1-9]+');
Route::get('/posts/{id}/edit',[PostController::class,'edit'])->name('posts.edit')->where('id','[1-9]+');

Route::put('/posts/{id}',[PostController::class,'update'])->name('posts.update')->where('id','[1-9]+');
Route::delete('/posts/{id}',[PostController::class,'destroy'])->name('posts.destroy')->where('id','[1-9]+');


Route::get('/comments',[CommentController::class,'index'])->name('comments.index');
Route::get('/comments/create/{postID}',[CommentController::class,'create'])->name('comments.create');
Route::post('/comments/{postID}',[CommentController::class,'store'])->name('comments.store');


Route::get('login/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider');
Route::get('{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');

// Route::get('/posts',function(){
//     return view('posts/index',['posts'=>$posts]);
// });

// Route::get('/posts/{id}',function($id){

// })





// Route::get('/users',function() use($users){
//     return view('users/index',['users'=>$users]);
// });

// Route::get('/users/{id}',function($id)use($users){
//     return view('users/show',['user'=>$users[$id-1]]);
// })->where('id','[1-9]*');

// Route::get('/users/create',function(){
//     return view('users/create');
// });

// Route::post('/users',function() use($users){
//     $name = request('name');
//     $email = request('email');
//     array_push($users,['name'=>$name,'email'=>$email]);

//     return 'user created';
// });



// Route::get('/users/{id}/edit',function($id)use($users){
//     return view('users/edit',['user'=>$users[$id-1]]);
// })->where('id','[1-9]*');



// Route::put('/users/{id}/update',function($id) use($users){
//     $name = request('name');
//     $email = request('email');
//     $users[$id-1]['name'] = $name;
//     $users[$id-1]['email'] = $email;

//     return 'user updated';
// })->where('id','[1-9]*');



// Route::delete('/users/{id}/delete',function($id) use($users){
//     array_splice($users,$id-1,1);
//     return 'user deleted';
// })->where('id','[1-9]*');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
