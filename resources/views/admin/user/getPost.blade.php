@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Post Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Auother Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->post->id}}</td>
                            <td><img src="{{ $post->post->image }}"></td>
                            <td>{{$post->post->title}}</td>
                            <td>{{$post->post->description}}</td>
                            <td>{{$post->post->auother_name}}</td>
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{route('post.show',$post->post->id)}}" class="btn btn-info">Show</a>
                                <a href="{{route('post.edit',$post->post->id)}}" class="btn btn-warning">Edit</a>
                                <form method="post" action="{{route('post.destroy',$post->post->id)}}"  style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <a href="{{route('post.create')}}" class="btn btn-primary pull-left">Add Post<div class="ripple-container"></div></a>
</div>
@endsection
