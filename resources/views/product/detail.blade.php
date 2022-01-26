<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row content">
            <div class="col-md-12">
                <div class="col-md-6">
                <h3>Welcome to {!!Session::get('shopowner_name')!!}</h3>
                </div>
                <div class="col-md-6">
                <a href="{{route('product.add')}}" class="btn btn-blue-no-border-radius crawlall pull-right" >Add</a> |
                    <a href="{{route('login.logout')}}" class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" >Logout</a>
                    
                </div>
            </div>
        </div>

       
         
         
        <div class="row content">
        {{--@foreach($project as $key=>$value)--}}
                <!-- product details start-->
                <div class="col-md-12">
                    <div class="col-md-4">
                        <img src=" {{ asset('storage/images/products/')."/".$data->product_image }}"  height="500" width="350">
                    </div>
                    <div class="col-md-7">
                        <div class="col-md-12">
                            <h2>{{$data->product_name}}<h2><br>
                            <h4><a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" >
                                    <span class="glyphicon glyphicon-usd">  
                                    </span> <b> {{number_format($data->product_price, 2, ',', '.')}} </b>  
                                </a>
                            </h4><br><br>
                            <p>
                            {{$data->product_description}}                                
                            </p>
                        </div>
                        <div class="col-md-12">
                            <br><br><br><br>
                            <a href="{{route('product.addtocart',$data->product_id)}}" class="edit btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-shopping-cart">  
                                </span> <b> Add to Cart </b>  
                            </a>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <!-- product details end-->
              
                {{--@endforeach--}}
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
    // function removeRow(row) {
    //     $(row).remove();
    // }
</script>

</html>