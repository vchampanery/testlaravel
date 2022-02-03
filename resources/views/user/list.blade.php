<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Datatables Tutorial - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>    
    <div class="container">
        <div class="row content">
            <div class="col-md-12">
                <div class="col-md-5">
                    <h4>Welcome UserList,</h4 >
                </div>
                <div class="col-md-5">
                <a href="{{route('login.signup')}}" class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" >Add</a> |
                    <a href="{{route('login.logout')}}" class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" >Logout</a>      
                          
                </div>
            </div>
        </div>
        <div class="row content">
            <div class="col-md-12">
                @if(Session::has('flashMessagesuccess'))
                    <div class="alert alert-success">
                        {{ Session::get('flashMessagesuccess') }}
                    </div>
                @endif
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th class="col-md-2">Thumb</th>
                            <th class="col-md-1">Name</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($data as $k => $v)
                        
                        <tr>
                            <td class="col-md-2">
                            @foreach($v['image'] as $ik => $iv)
                            <img src="{{url('/storage/users/')}}/{{$iv}}"  height="100" width="100">
                            @endforeach
                            </td>
                            <td class="col-md-1">{{$v['name']}}</td>
                            <td class="col-md-2">
                                <a href="{{route('systemuser.delete',$v['id'])}}" class="edit btn btn-primary btn-sm">Delete</a> 
                                <!-- <a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
   
<script type="text/javascript">
    $(function () {
        var IRL = "{{ route('systemuser.list') }}";
        var table = $('.data-table').DataTable();
    });
    

</script>
</html>