@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Create Role</h4>
            <p class="card-category">Complete your role</p>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('role.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Role Name</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Create Role</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
</div>
@endsection
