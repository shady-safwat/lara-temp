<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.user.all',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
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
        $data = $request->all();
        $users=[
            'name' => ['required', 'string', 'min:5', 'max:10'],
            'email' => ['required', 'string', 'email' , 'unique:users'],
            'password' => ['required' , 'min:8']
        ];
        $validator = Validator::make($data , $users);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => Hash::make($request->password),
            'remember_token' => $request->_token,
            'role_id' => $request->role,
        ]);
        return redirect()->back()->with('success', 'Task Created Successfully!');;
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
        $user = User::findOrFail($id);
        return view('admin.user.show',compact('user'));
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
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
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
        $users=[
            'name' => ['required', 'string', 'min:5', 'max:10'],
            'email' => ['required', 'string', 'email' , 'unique:users'],
            'password' => ['required' , 'min:8']
        ];
        $validator = Validator::make($data , $users);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name ,
            'email' => $request->email
        ]);
        return redirect()->back();
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
        $user = User::findOrFail($id) ;
        $user->delete();
        return redirect()->back();
    }
    public function getPost($id){

        $post = User::findOrFail($id)->load([
            'post'=>function($query){
                $query->select('id','image','title','description','name','auother_name');
            }
        ])->where('id',$id)->get();
        return response()->json($post);
    }


}
