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
                    <h4>Welcome {!!Session::get('shopowner_name')!!},</h4 >
                </div>
                <div class="col-md-5">
                   
                    <a href="{{route('product.add')}}" class="btn btn-blue-no-border-radius crawlall pull-right" >Add</a> |
                    <a href="{{route('login.logout')}}" class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" >Logout</a>      
                </div>
            </div>
        </div>
        <div class="row content">
            <div class="col-md-12">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th class="col-md-2">Thumb</th>
                            <th class="col-md-1">Name</th>
                            <th class="col-md-2">Category</th>
                            <th class="col-md-2">Subcategory</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
   
<script type="text/javascript">
    $(function () {
    
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.indexYjr') }}",
            columns: [
                {data: 'product_image', name: 'product_image'},
                {data: 'product_name', name: 'product_name'},
                {data: 'product_category', name: 'product_category'},
                {data: 'product_subcategory', name: 'product_subcategory'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            columnDefs: [
                {
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'render': function (data, type, full, meta){
                    // var path ='{{ asset("/images/products/") }}';
                    // return '<img src="'+path+'/'+full.product_image+'"  height="100" width="100">';
                    // var path ="{{str_replace('\\', '/',storage_path('app/public/images/products'))}}";
                    // var final = "{{ URL::asset('storage/photo.jpg') }}";
                    var final = '{{asset("storage/images/products/")}}';
                    return '<img src="'+final+'/'+full.product_image+'"  height="100" width="100">';
                }
            },
            {
                'targets': 4,
                'searchable': false,
                'orderable': false,
                'render': function (data, type, full, meta){
                    // return  '<input class="alarm-checkbox " name="project_complience_id[]" id="project_complience_id" value="'+ full.compliance_id +'" type="checkbox"  onclick="return insertValue(this);">';
                    var editlink="{{url('product/edit/')}}";
                    return  '<a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" class="edit btn btn-primary btn-sm">Delete</a>&nbsp;<a href="'+editlink+'/'+full.product_id+'" class="edit btn btn-primary btn-sm" >Edit</a>';
                }
            }]
        });
    });
    function reload(){
        var table = $('.data-table').DataTable();
        table.ajax.reload(null, false);
    }
    
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
                
                reload();
            },
            complete   : function () {
                console.dir("test complete");
            }
        });
    }

</script>
</html>