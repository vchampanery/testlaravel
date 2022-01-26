<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-md-12">
                <div class="col-md-6">
                    <h1>Product</h1>
                </div>
                <div class="col-md-6">
                
                    <a href="{{route('product.add')}}" class="btn btn-blue-no-border-radius crawlall pull-right" >Add</a> 
                    <a href="{{route('login.logout')}}" class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" >Logout</a>
                    Current Language :{{App::getLocale()}} 
                </div>
            </div>
        </div>
        <div class="row content">
            <div class="col-md-12">
            <table class="table table-bordered data-table display nowrap">
                            <thead>
                                <tr>
                                    <th>Thumb</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project as $key=>$value)
                                <tr>
                                    <td>{{$value->product_image}}</td>
                                    <td>{{$value->product_name}}</td>
                                    <td>{{$value->product_category}}</td>
                                    <td>{{$value->product_subcategory}}</td>
                                    <td>
                                        <a href="{{route('product.edit',$value->product_id)}}">Edit</a> | 
                                        <!-- <a href="{{route('product.delete')}}" onclick="deleteRecord()">Delete</a> -->
                                        <a href="javascript:void(0);" onclick="deleteRecord({{$value->product_id}})">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    
            </div>
        </div>
    </div>



    
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('.data-table').DataTable();
    });
    
    function deleteRecord(id){
        var pdUrl = "{{route('product.delete')}}";
        $.ajax({
                url        : pdUrl,
                type       : 'DELETE',
                data       : {_token: "{{ csrf_token() }}",'id':id},
                beforeSend : function () { 
                    console.dir("test start");
                },
                success : function (response) {
                    console.dir("test success");
                    // $(".data-table").ajax.reload();
                    // console.dir($(this));
                    console.dir($(this).parent('td'));
                    $(this).parent('td').parent('tr').remove();
                    // $(this).parent('td').remove();
                },
                complete   : function () {
                    console.dir("test complete");
                }
            });
    }
</script>

</html>