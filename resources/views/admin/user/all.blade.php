@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">User Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                            <td  class="pull-left">
                                <a href="{{route('user.show',$user->id)}}" class="btn btn-info">Show</a>
                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('user.post',$user->id)}}" class="btn btn-primary">Post</a>
                                <form method="post" action="{{route('user.destroy',$user->id)}}"  style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <a href="{{route('user.create')}}" class="btn btn-primary pull-left">Add User<div class="ripple-container"></div></a>
</div>
@endsection
