@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit User</h4>
            <p class="card-category">Edit your profile</p>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('user.update', $user->id)}}">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="password" value="{{$user->password}}">
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Update User</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection
