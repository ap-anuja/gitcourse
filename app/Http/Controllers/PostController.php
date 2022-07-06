<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('post', compact('id','name','password'));
        //return "It's working!!1";
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreatePostRequest $request)
    {
        $input = $request->all();
        if($file = $request->file('file'))
        {
            $name = $file->getClientOriginalName();
            //move the location of the file
            //it will create a new images folder if you don't already have it
            $file->move('images', $name);
            $input['path'] = $name;
        }
        Post::create($input);

    //    $this->validate($request, ['title'=>'required']);
    //     Post::create($request->all());
    //     return redirect('/posts');   
    // --------------------------------------------
    //files
        // $files = $request->file('file'); 
        // echo $files->getClientOriginalName().'<br>';
        // echo $files->getSize();
    }   

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return "It's working!!!";
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->delete();
        return redirect('/posts');
    }

    // public function contact()
    // {
    //     $people = ['Anuja', 'Ishwar', 'Leena', 'Jyoti', 'Snehal', 'Nikhil'];
    //     return view('contact' ,compact('people'));
    // }

    public function show_post($id,$name,$password)
    {
       // return view('SView')->with('name',$name);
        return view('post', compact('id','name','password'));
    }
}


// public function store(Request $request)
//     {
//         //return $request->title;

//         //getting specific input
//         //return $request->get('title');

//         //getting all the data
//         //return $request->all();
//  //----------------------------------------
            
//         //1) Persisting data to DB
//         Post::create($request->all());

//         return redirect('/posts');
        
//         //2) Persisting data to DB
//         // $post =new Post;
//         // $post->title = $request->title;
//         // $post->save();

//         //3) Persisting data to DB
//         // $input = $request->all();
//         // $input['title'] = $request->title;
//         // Post::create($request->all());

//     }   

