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
         <blockquote>{{$comment->user->name}}</blockquote>
         <p>{{$comment->text}}</p>
         <span class="badge">{{$comment->created_at}}</span>
       </div>
       @endforeach
       <form class="form comment-form" action="{{route('post.comment'
       ,['user_id'=>Auth::user()->id,'post_id'=>$post->id])}}">
         
         @csrf
          <div class="form-group">
            <textarea name="text" multiline required
            >
          </textarea><br>
          </div>
          <input id="submit-comment" type="submit" class="btn-small  btn-secondary"
            value="Comment" />
       </form>
   @endif
@endsection