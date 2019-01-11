@extends('index')
@section('content')


@if(isset($post))
    <h1 class="text-danger">Update Post</h1>
    {{Form::model($post,['route'=>['post.update'],'method'=>'put'])}}
@else
     <h1 class="text-danger">Create a New post</h1>
    {{Form::open(['route'=>'post.add', 'method'=>'post'])}}
@endif
   <fieldset>
       <label for="title" >
           {{Form::text('title',null)}}
       </label>
   </fieldset>
   <fieldset>
       <label for="content">
           {{Form::textarea('content',null)}}
       </label>
   </fieldset>
   <fieldset>
       {{Form::submit('submit', array('class'=>'btn btn-lg btn-primary'))}}
       <input type=reset name="reset" value="Clear" class="btn btn-lg btn-warning"/>
   </fieldset>
{{Form::close()}}
@endsection