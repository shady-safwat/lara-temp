@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Post</h4>
            <p class="card-category">Edit your Post</p>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="title" value="{{$post->title}}">
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="description" value="{{$post->description}}">
                            @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <input type="file" class="form-control" name="image"  value="{{$post->image}}" style="z-index:1;opacity:1;position: relative;">
                            <img src="/public/image/{{ $post->image }}" width="300px">
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Update Post</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection
