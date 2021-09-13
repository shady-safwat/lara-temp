<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.post.all',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users=User::all();
        return view('admin.post.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $data = $request->all();
        $posts=[
            'title' => ['required', 'string', 'min:5', 'max:50'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ];
        $validator = Validator::make($data , $posts);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }
        $fileNameWithEx = $request->file('image')->getClientOriginalName();
        $imageNameToStore = $fileNameWithEx.'_'.time().'.'.$request->file('image')->getClientOriginalExtension();
        Post::create([
            'title' => $request->title ,
            'description' => $request->description,
            'auother_name' => $request->auother_name,
            'image' =>$request->file('image')->storeAs('images',$imageNameToStore)
        ]);
        return redirect()->back()
        ->with('success', 'Post Created Successfully!')
        ->with('image',$imageNameToStore);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('admin.post.edit',compact('post'));
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
        //

        $data = $request->all();
        $posts=[
            'title' => ['required', 'string', 'min:5', 'max:50'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ];
        $validator = Validator::make($data , $posts);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $imageName = time().'.'.$request->image->extension();
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title ,
            'description' => $request->description,
            'image' => $request->image->move(public_path('/public/image'), $imageName),
        ]);
        return redirect()->back()->
        with('success', 'Post Created Successfully!')->
        with('image',$imageName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Post::findOrFail($id) ;
        $user->delete();
        return redirect()->back();
    }

}
