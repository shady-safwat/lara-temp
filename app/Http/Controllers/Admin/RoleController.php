<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.role.all',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.role.create');
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
        $roles=[
            'name' => ['required', 'string', 'min:4', 'max:10'],
        ];
        $validator = Validator::make($data , $roles);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        Role::create([
            'name' => $request->name ,
        ]);
        return redirect()->back()->with('success', 'Role Created Successfully!');
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
        $user = Role::findOrFail($id)->with([
            'user' => function($query){
                $query->select('id','name','role_id');
            }
        ])->where('id',$id)->get();
        return response()->json($user);

        // return view('admin.role.show',compact('users'));
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
        $role = Role::findOrFail($id);
        return view('admin.role.edit',compact('role'));
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
        $roles = Role::findOrFail($id);
        $data = $request->all();
        $roles=[
            'name' => ['required', 'string', 'min:4', 'max:10'],
        ];
        $validator = Validator::make($data , $roles);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'Role updated Successfully!');;
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
        $user = Role::findOrFail($id) ;
        $user->delete();
        return redirect()->back();
    }
}
