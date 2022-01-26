<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>This is example from ItSolutionStuff.com</h1>
    <a href="{{route('login.index')}}"  class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" ><i class="fas fa-step-backward"></i>Login</a>
    <a href="{{route('login.logout')}}"  class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" ><i class="fas fa-step-backward"></i>Logout</a>
</body>
</html>