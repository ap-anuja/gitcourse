<?php

use Illuminate\Support\Facades\Route;

//importing the model called ------> Post
use App\Models\Post;
//importing the user model
use App\Models\User;
//importing the Role model for many-many relationship
use App\Models\Role;
//importing the Country model for hasManyThrough relationship
use App\Models\Country;
//importing Photo model for 1-1 polymorphic relationship
use App\Models\Photo;
//importing Video and Tag and Taggable model for polymorphic many-many
use App\Models\Video; use App\Models\Tag; use App\Models\Taggable;
//importing carbon for displaying dates
use Carbon\Carbon;

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

// Route::get('/about', function () {
//     return "This is about page!";
// });

// Route::get('/contact', function () {
//     return "This is contact page!";
// });

// Route::get('/post/{id}/{name}',function ($id,$name)
// {
//     return "This is post number". $id . " " . $name;
// });

// Route::get('admin/post/example',array('as'=>'admin.home' ,function (){
//     $url = route('admin.home');
//     return "This URL is : ".$url;
// }));
 
// Route::get('/post/{id}/{name}/{password}', '\App\Http\Controllers\PostController@show_post'); 

// Route::get('/contact','\App\Http\Controllers\PostController@contact');

//Route::get('/show_post/{id}/{name}/{password}', 'App\Http\Controllers\PostController@show_post');

// Route::get('post/{$id}', 'App\Http\Controllers\PostController@show');    

/*
|--------------------------------------------------------------------------
| DATABASE RAW SQL QUERIES
|--------------------------------------------------------------------------
|
*/

// Route::get('/insert', function()
// {
//     DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel','Laravel is the best thing to happen to PHP']);
// });

// Route::get('/read',function(){
//     $results = DB::select('select * from posts where id=?', [1]);
//     var_dump($results);
//     foreach($results as $post)
//     {
//        // return $post;
//         return $post->title;
//     }
// });

// Route::get('/update',function(){
//    $updated =  DB::update('update posts set title="updated title" where id=?', [1]);
//    return $updated;
// });

// Route::get('/delete', function(){
//     $delete = DB::delete('delete from posts where id=?', [1]);
//     return $delete;
//     if($delete==0)
//     {
//         echo "well done!!!";
//     }
//     else{
//         echo "still well done!!!";
//     }
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT 
|--------------------------------------------------------------------------
|
*/
//finding all the records
// Route::get('/read', function(){
//   //  $posts = App\Post;
//   $posts = Post::all();
//   foreach($posts as $post){
//     return $post->title;
//   }
// });

//finding specific records
// Route::get('/find', function(){
//     $post = Post::find(2)->title;
//     return $post;
// });

//retreiving info with conditions or constraints

// Route::get('/insert', function()
// {
//     DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel is awesome with Edwin', 'Laravel is the best thing to happen to PHP, PERIOD']);
// });

// Route::get('/find_where', function(){
//     $post = Post::where('id', 3)->orderBy('id', 'desc')->get();
//     return $post;
// });

// Route::get('/findmore', function(){
//     // $posts = Post::findOrFail(2);
//     // return $posts;

//     $posts = Post::where('users_count()', '<', 50)->firstOrFail();
//     return $posts;
// });


// Route::get('/basicinsert', function(){
//     $post = new Post;

//     $post->title = "New Eloquent tile inserted!!!";
//     $post->content = "Wow eloquent is really cool!!!";

//     $post->save();
// });

//find the record and update it
// Route::get('basicinsert', function(){
//     $post = Post::find(2);
//     $post->title = "New Eloquent title 2";
//     $post->content = "New Eloquent content is here, look at this content 2";
//     $post->save();
// });

// Route::get('create', function(){
//     $post = Post::create(['title'=>'this is the new title, hello', 'content'=>'this is the new content, hello!!!']);
// });

// Route::get('/update', function(){
// Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'THIS IS THE NEW TITLE', 'content'=>'THIS IS THE NEW CONTENT']);
// });

//------------------------
// Route::get('/insert', function(){
// $post = new Post;
// $post->title="SAMPLE TITLE";
// $post->content="SAMPLE CONTENT";
// $post->save();
// });

// Route::get('/delete', function(){
//    $post = Post::find(6);
//    $post->delete();
// });

// Route::get('/delete2', function(){
// Post::destroy([4,5]);
// });
//--------------------------------

// Route::get('/softdelete', function(){
// Post::find(2)->delete();
// });

// Route::get('/getdeleted', function(){
//     //$post = Post::withTrashed()->where('id', 2)->restore();
//     // $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//     // return $post;
// });

// Route::get('/forcedelete', function(){
// Post::withTrashed()->where('id', 2)->forcedelete();
// });

/*
|--------------------------------------------------------------------------
| ELOQUENT RELATIONSHIPS
|--------------------------------------------------------------------------
|
*/
//one to one relationship
// Route::get('/user/{id}/post', function($id){
//     $posts = User::find($id)->post;
//     return $posts;
// }); 

// Route::get('/post/{id}/user', function($id){
//     $posts = Post::find($id)->user->name;
//     return $posts;
// });

//ONE TO MANY RELATIONSHIP
// Route::get('/posts', function(){
// $user = User::find(1);
// foreach($user->posts as $post)
// {
//    echo $post->title . "<br>";
// }
// });

//MANY TO MANY RELATIONSHIP
// Route::get('/roles', function(){
//     $roles = Role::all();
//     foreach($roles as $values)
//     {
//         echo $values . "<br>";
//     }
// });

// Route::get('/user/{id}/role', function($id){
//     //returning the whole role
//    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
//    return $user;
//    //returning only the role name
//     $user = User::find($id);
//     foreach($user->roles as $role)
//     {
//         return $role->name;
//     }
// });

//ACCESSING THE INTERMEDIATE TABLE / PIVOT
// Route::get('/user/pivot', function(){
//    $user = User::find(1);

//     foreach($user->roles as $role)
//     {
//         echo $role->pivot->created_at;
//         //echo $role->pivot;
//     }
// }); 
//HAS MANY THROUGH RELATION
// Route::get('/user/country', function(){
//  $country = Country::find(3);
//  foreach($country->posts as $posts)
//  {
//      return $posts->title;
//  }
// });

//POLYMORPHIC 1-1 RELATIONSHIP
//getting the info from user
// Route::get('/user/photos', function(){
//     $user = User::find(1);
//     foreach($user->photos as $photo){
//         return $photo->path;
//     }
// });
//getting the info from post
// Route::get('/post/{id}/photos', function($id){
//     $posts = Post::find($id);
//     foreach($posts->photos as $post){
//        $value = $post->path;
//        if($value == 0)
//        {
//         return "there is no value, but well done!";
//        }
//        else
//        {
//           return $value;
//        }
//     }
// });
//POLYMORPHIC RELATION THE INVERSE
// Route::get('/photos/{id}/post', function($id){
//     $photo = Photo::findOrFail($id);
//     return  $photo->imageable;
// });

//POLYMORPHIC RELATION MANY-MANY
// Route::get('/post/tag', function(){
//     $post = Post::find(2);
//     //return $post;
//     foreach($post->tags as $tag)
//     {
//         echo $tag->name;
//     }
// });

// Route::get('/tag/post', function(){
//     $tag = Tag::find(1);
//     return $tag->posts;
//     foreach($tag->posts as $post)
//     {
//         echo $post->title;
//     }
// });

/*
|--------------------------------------------------------------------------
|CRUD APPLICATION
|--------------------------------------------------------------------------
|
*/


// Route::group(['middleware'=>'web', function(){
   // Route::resource('/posts', '\App\Http\Controllers\PostController');
// }]);

// Route::put('/post/{post}', function (Post $post) {
//     // The current user may update the post...
// })->middleware('can:update,post');

Route::group(['middleware'=>'web'], function () {
    Route::resource('/posts', '\App\Http\Controllers\PostController');
  });

  Route::get('/dates', function(){
    $date = new DateTime('+1 week');
    echo $date->format('m-d-Y');
    echo '<br>';
    echo Carbon::now()->addDays(10)->diffforHumans();
    echo '<br>';
    echo Carbon::now()->diffforHumans();
    echo '<br>';
    echo Carbon::now()->subMonths()->diffforHumans();
    echo '<br>';
    echo Carbon::now()->yesterday();    
  });

  Route::get('/getname', function(){
    $user = User::findOrFail(1);
    echo $user->name;
  });

  Route::get('/setname', function(){
    $user = User::findOrFail(1);
    $user->name = "akash sabale";
    $user->save();
  });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
