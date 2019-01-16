@extends('index')

@section('content')
   @if($post)
       <article>
       	    <h3 class="text-success text-capitalize">{{$post->title}}</h3>
       	    By: <a href="#{{$post->user->name}}">
       	    	{{$post->user->name}}
       	    </a><br>

       	    <p>
       	    	{{$post->content}}
       	    </p>
       </article>
       <div class="separator"></div>
       <h5>Comments here!!!</h5>
       @foreach($post->comments as $comment)
       <div class="section">
         <a class="text-info">{{$comment->user->name}}</a>
         <p>{{$comment->text}}<br>
          <span class="badge">{{$comment->created_at}}</span><br>
          <span>
           
            <a class="text-info number-likes">
              {{$comment->likes->count()!=null?$comment->likes->count():0}}
            </a>
            <a  data-url="{{route('comment.like',$comment->id)}}"  class="text-info status">
              Like
            </a>
          </span>
         </p>
         
       </div>
       @endforeach
       <div class="separator"></div>
       <span class="status text-success text-bold"></span><br>
       @if(Auth::check())
          <div class="form-group">
            <textarea name="text" multiline required>
            </textarea><br>
          </div>
          <button id="comment-submit" class="btn btn-success"
             data-url="{{route('post.comment',['user_id'=>Auth::user()->id,'post_id'=>$post->id])}}">Comment</button>
       @endif
   @endif

@endsection