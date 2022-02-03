<html>
<head>
    <!-- Scripts -->
    
    <style>
        .errorTxt{
            border: 1px ;
            color: red;
            min-height: 20px;
        }
    </style>
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
    <h1>Register</h1>
    
    <form role="form" method="POST" id="loginForm"  
                        action="{{ route('register.submit')  }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    @if(Session::has('flashMessage'))
                        <div class="alert alert-danger">
                            {{ Session::get('flashMessage') }}
                        </div>
                    @endif
                    <div class="card px-5 py-5" id="form1">
                        <div class="form-data" v-if="!submitted">
                        <div class="errorTxt">
                            
                            </div>
                            <table style="text-align:right;">
                                <thead>
                                    <th></th>
                                    
                                </thead>
                                <tbody>
                                    <tr align="left">
                                        <td>Name :</td>
                                        <td><input autocomplete="off" type="text" name="name" >
                                            {{ $errors->first('name') }}
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td>Username :</td>
                                        <td><input autocomplete="off" type="text" name="username" >
                                            {{ $errors->first('username') }}
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td>Email :</td>
                                        <td><input autocomplete="off" type="text" name="email" >
                                            {{ $errors->first('email') }}
                                        </td>
                                    </tr>
                                    <tr  align="left">
                                        <td>Password :</td>
                                        <td><input autocomplete="off" type="text" name="password" >
                                            {{ $errors->first('password') }}
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td>Password :</td>
                                        <td><input type="file" name="image[]" placeholder="Choose image" 
                                        id="image[]"  multiple>
                                            {{ $errors->first('image') }}
                                        </td>
                                    </tr>
                                    <tr align="left">
                                        <td>
                                            <a class="btn btn-dark w-100"  href="{{route('home.index')}}">Back</button> 
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-dark w-100">Register</button> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                },
                password: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "specify name",
                },
                email: {
                    required: "specify email",
                    email: "specify valid email"
                },
                username: {
                    required: "specify username",
                },
                password: {
                    required: "specify password"
                }
            },
            errorElement : 'div',
            errorLabelContainer: '.errorTxt'
        });
    });

</script>
</html>