
    
    
    


<html>
<head>
    <!-- Scripts -->
    
   
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
</head>
<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6" style="text-align:center;">
            <h1>Home page </h1>

@if(session('user_login'))
    {{session('user_email')}} 
    <br><a href="{{route('login.logout')}}"  class="btn btn-blue-no-border-radius crawlall pull-right" 
    role="button" data-toggle="tooltip" ><i class="fas fa-step-backward"></i>Logout</a>
    <br><a href="{{route('systemuser.list')}}"  class="btn btn-blue-no-border-radius crawlall pull-right"
     role="button" data-toggle="tooltip" ><i class="fas fa-step-backward"></i>User List</a>
    

@else
    <br><a href="{{route('login.index')}}"  class="btn btn-dark w-100" role="button" 
    data-toggle="tooltip" ><i class="fas fa-step-backward"></i>Login</a>
@endif
            </div>
        </div>
    </div>
</body>
</html>
