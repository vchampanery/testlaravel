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
                    <a href="{{route('product.cart')}}" class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" >Cart</a>
                </div>
            </div>
        </div>

        <!-- order pagelist start -->
        <!-- <div class="row content">
            <div class="col-md-12">
            <table class="table table-bordered data-table display nowrap">
                            <thead>
                                <tr>
                                    <th class="col-md-1">Thumb</th>
                                    <th class="col-md-6">Name</th>
                                    <th class="col-md-1">SKU</th>
                                    <th class="col-md-1">QTY</th>
                                    <th class="col-md-1">UNIT PRICE</th>
                                    <th class="col-md-1">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$value)
                                <tr onmousedown="removeRow(this)">
                                    <td class="align-middle">{{$value['thumb']}}<img src="{{ asset('/images/products/test.jpg') }}"  height="100" width="100"></td>
                                    <td>{!!$value['description']!!}</td>
                                    <td>{!!$value['sku']!!}</td>
                                    <td>
                                    {!!$value['qty']!!} </td>
                                    <td>
                                    {!!$value['unitprice']!!}  
                                    </td>
                                    <td>
                                    {!!$value['total']!!} 
                                   </td>
                                </tr>
                                @endforeach
                            </tbody>
                    
            </div>
        </div> -->
         <!-- order page list end -->
         
         
        <div class="row content">
        @foreach($data as $key=>$value)
                <!-- product details start-->
                <!-- <div class="col-md-12">
                    <div class="col-md-4">
                        <img src="{{ asset('/images/products/test.jpg') }}"  height="500" width="350">
                    </div>
                    <div class="col-md-7">
                        <div class="col-md-12">
                            <h2>Winter Coat<h2><br>
                            <h4><a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" >
                                    <span class="glyphicon glyphicon-usd">  
                                    </span> <b> 200.00 </b>  
                                </a>
                            </h4><br><br>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <br>
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived     not only five centuries, but also the leap into
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived     not only five centuries, but also the leap into
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived     not only five centuries, but also the leap into
                            </p>
                        </div>
                        <div class="col-md-12">
                            <br><br><br><br>
                            <a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" class="edit btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-shopping-cart">  
                                </span> <b> Add to Cart </b>  
                            </a>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div> -->
                <!-- product details end-->
                <!-- product listing start-->
                <div class="col-md-12">
                    <div class="col-md-4">
                        <img src='{{ asset("storage/images/products/$value->product_image") }}'
                        height="200" width="200">
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12">
                            <label><a href="{{route('product.detail',$value->product_id)}}">{{$value->product_name}}</a></label><br>
                            <p>
                            {{$value->product_description}}
                            </p>
                            <a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" >
                                <span class="glyphicon glyphicon-usd">  
                                </span> <b> {{$value->product_price}} </b>  
                                </a>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('product.addtocart',$value->product_id)}}"  class="edit btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-shopping-cart">  
                                </span> <b> Add to Cart </b>  
                            </a>
                            <a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" class="edit btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-heart">  
                                </span> <b> Add wishlist </b>  
                            </a>
                        </div>
                    </div>
                </div>
                 <!-- product listing end-->
                @endforeach
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