@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Role</h4>
            <p class="card-category">Edit your role</p>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('role.update', $role->id)}}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="name" value="{{$role->name}}">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Update Role</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
</div>
@endsection
