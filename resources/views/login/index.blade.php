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
    <h1>Login</h1>
    <form role="form" method="POST" id="loginForm"  
                        action="{{ route('login.loginsubmit')  }}">
                        {{ csrf_field() }}
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">

                    @if(Session::has('flashMessage'))
                        <div class="alert alert-danger">
                            {{ Session::get('flashMessage') }}
                        </div>
                    @endif
                    @if(Session::has('flashMessagesuccess'))
                        <div class="alert alert-success">
                            {{ Session::get('flashMessagesuccess') }}
                        </div>
                    @endif
                    
                
                    <div class="card px-5 py-5" id="form1">
                        <div class="form-data" v-if="!submitted">
                            <div class="forms-inputs mb-4"> <span>Username</span> 
                            <input autocomplete="off" type="text" name="username" >
                            {{ $errors->first('username') }}
                                <!-- <div class="invalid-feedback">A valid email is required!</div> -->
                            </div>
                            <div class="forms-inputs mb-4"> <span>Password</span> 
                            <input autocomplete="off" type="password" name="password" >
                            {{ $errors->first('password') }}
                                <!-- <div class="invalid-feedback">Password must be 8 character!</div> -->
                            </div>
                            <div class="mb-3"> <button type="submit" class="btn btn-dark w-100">Login</button> </div>
                        </div>
                        <a class="btn" href="{{route('login.signup')}}">SignUp</a>
                        <a class="btn" href="{{route('home.index')}}">Back</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
</body>
<script type="text/javascript">
   $(document).ready(function () {
        $("#loginForm").validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "specify username",
                },
                password: {
                    required: "specify password"
                }
            }
        });
    });

</script>
</html>