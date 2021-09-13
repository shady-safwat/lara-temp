@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Show Post</h4>
        </div>
        <div class="card-body">
            <form method="" action="">
                @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                        <input type="email" class="form-control" name="description" value="{{$post->description}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <input type="text" class="form-control" name="auother_name" value="{{$post->auother_name}}">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <img src="/public/image/{{ $post->image }}" width="500px">
                    </div>
                </div>
            </div>

            <a type="submit" class="btn btn-primary pull-right" href="{{route('post.index')}}">Back</a>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection
