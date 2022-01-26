<html>
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Login</h1>
    <form role="form" method="POST" action="{{ route('login.loginsubmit')  }}">
    {{ csrf_field() }}
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    
                        @if(Session::has('flashMessage'))
                            <div class="alert alert-danger">
                                {{ Session::get('flashMessage') }}
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
                            <div class="mb-3"> <button v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Login</button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>