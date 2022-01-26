<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <h1>Home page </h1>

        @if(session('user_login'))
            {{session('user_email')}} 
            <br><a href="{{route('login.logout')}}"  class="btn btn-blue-no-border-radius crawlall pull-right" 
            role="button" data-toggle="tooltip" ><i class="fas fa-step-backward"></i>Logout</a>
            <br><a href="{{route('product.list')}}"  class="btn btn-blue-no-border-radius crawlall pull-right"
             role="button" data-toggle="tooltip" ><i class="fas fa-step-backward"></i>Product List</a>
            

        @else
            <br><a href="{{route('login.index')}}"  class="btn btn-blue-no-border-radius crawlall pull-right" role="button" 
            data-toggle="tooltip" ><i class="fas fa-step-backward"></i>Login</a>
        @endif
    
    
    
</body>
</html>