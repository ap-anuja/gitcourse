<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Session\Session\flash;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $posts = auth()->user()->posts()->paginate(3);
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function show(Post $post)
    {
        //Post::findOrFail($id);
        return view('blog-post', ['post'=>$post]);
    }
    public function create()
    {
        $this->authorize('create',Post::class);
        //Post::findOrFail($id);
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create',Post::class);
        $post = new Post;
        $post->title=$request->title;
        $post->post_image=$request->post_image;
        $post->body=$request->body;
        //$post->save();
        auth()->user()->posts()->save($post);
        return redirect()->route('post.index')->with('post-created-message', 'post was created');

       // return redirect('post.index');
        //dd($post);
        //return redirect('post.index');
    //   $inputs = request()->validate([
    //     'title'=>'required|min:8|max:255',
    //     'post_image'=>'file',
    //     'body'=>'required'
    //    ]);
    //    if(request('post_image'))
    //    {
    //     $inputs['post_image']=request('post_image')->save('images');
    //    }
    //    else
    //    {
    //     return 'not able to upload file';
    //    }
    //   auth()->user()->posts->create($inputs);

    //   return redirect()->route('post.index')->with('post-created-message', 'post was created');
  //  https://youtu.be/xaMhrkr2Okw
     }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
         $post->delete();
        // Session::flash('message', 'Post was deleted');
         return back()->with('success', 'deleted successfully');
       // return redirect('post.index')->with('success', 'deleted successfully');
    }

    public function edit(Post $post)
    {
        $this->authorize('view',$post);
        return view('admin.posts.edit', ['posts'=>$post]);
    }
    
    public function update(Request $request)
    {

        $post = new Post;
        $post->title=$request->title;
        $post->post_image=$request->post_image;
        $post->body=$request->body;
       $this->authorize('update',$post);

        $post->save();
        return redirect()->route('post.index')->with('updated', 'updated successfully');

    //         $inputs = request()->validate([
    //         'title'=>'required|min:8|max:255',
    //         'post_image'=>'file',
    //         'body'=>'required'
    //     ]);

    //     if(request('post_image'))
    //    {
    //     $inputs['post_image']=request('post_image')->store('images');
    //     $post->post_image=$inputs['post_image'];
    //    }

    //    $post->title=$inputs['title'];
    //    $post->body=$inputs['body'];
    //    $post->update();
    //  //  auth()->user()->posts()->save($post);
    //    return back()->with('updated', 'updated successfully');
    //   // return redirect()->route('post_index');
    }
}
