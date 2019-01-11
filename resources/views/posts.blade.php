@extends('index')
@section('content')

<div class="col-md-7">
    <table  class="table table-striped">
        <thead class="text-info">
            <th class="text-capitalize">Post ID</th>
            <th class="text-capitalize">Post Title</th>
            <td class="text-capitalize">Post Created</td>
            <td class="text-capitalize">Post Updated</td>
            <th class="text-center"  colspan="2">Action</th>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td><a  class="btn btn-primary" href="{{route('post.edit',$post->id)}}">Edit</a></td>
            <td><a  class="btn btn-danger" href="{{route('post.delete',$post->id)}}">Delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection