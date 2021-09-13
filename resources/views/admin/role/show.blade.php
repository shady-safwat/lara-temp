{{-- @extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Show Role</h4>
        </div>
        <div class="card-body">
            <form method="" action="">
                @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                        <input type="text" class="form-control" name="name" value="{{$role->name}}">
                    </div>
                </div>

            <a type="submit" class="btn btn-primary pull-right" href="{{route('role.index')}}">Back</a>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.admin')
@section('content')
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
                    <td>{{$user->user->id}}</td>
                    <td>{{$user->user->name}}</td>
                    <td>{{$user->user->email}}</td>
                    <td>{{ \Carbon\Carbon::parse($user->user->created_at)->diffForHumans() }}</td>
                    <td  class="pull-left">
                        <a href="{{route('user.show',$user->user->id)}}" class="btn btn-info">Show</a>
                        <a href="{{route('user.edit',$user->user->id)}}" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{route('user.destroy',$user->user->id)}}"  style="display:inline-block">
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
@endsection
