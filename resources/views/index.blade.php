<html>
<head>
 {{Html::style('css/app.css')}}
 <meta name="_token" content="{{csrf_token()}}" />
 {{Html::script('js/jquery-min.js')}}

</head>
<body>
        <nav class="navbar navbar-dark navbar-expand bg-secondary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse">
                    {{Form::open(['route'=>'post.find','method'=>'get', 'class'=>'form-inline'])}}
                      <input type="search" class="form-control" name="search"
                      placeholder="Search Blog" required/>
                   {{Form::close()}}
                </div>
            </div>
        </nav><br>
        <div class="col-md-7">
            @yield('content')
       </div>
 {{Html::script('js/app.js')}}
 {{Html::script('js/custom.js')}}
 {{Html::script('js/comment-ajax.js')}}
 </body>
</html>