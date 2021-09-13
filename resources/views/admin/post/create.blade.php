@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Create Post</h4>
            <p class="card-category">Complete your post</p>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Title</label>
                            <input type="text" class="form-control" name="title">
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Description</label>
                            <input type="text" class="form-control" name="description">
                            @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="auother_name" value="{{Auth::user()->name}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <input type="file" class="form-control" name="image"  style="z-index:1;opacity:1;position: relative;">
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Create Post</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
</div>
@endsection
