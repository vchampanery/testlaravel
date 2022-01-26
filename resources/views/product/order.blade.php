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
                    <a href="{{route('product.userList')}}" class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" >Product</a>
                    
                </div>
            </div>
        </div>

        
        <div class="row content" style="text-align:center;">
            <div class="col-md-12">
                <h1>Checkout completed</h1>
            </div>
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                {{$message}}
                </div>
            </div>
            <div class="col-md-12 center-block" >
                <!-- <table>
                    <thead>
                        <th></th>
                        <th>Order number </th>
                        <th>Date Purchased</th>
                        <th>Total Payable</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>#12345</td>
                            <td>August 26,2016</td>
                            <td>$95.00</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table> -->
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-3">
                    <label>Order number</label><br>
                    <span># {{  $data['order_id'] }}</span>
                </div>
                <div class="col-md-3">
                    <label>Date Purchased</label><br>
                    <span>{{  $data['date'] }}</span>
                </div>
                <div class="col-md-3">
                    <label>Total Payable</label><br>
                    <span>{{ $data['total'] }}</span>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
         
         
         
        <div class="row content">
        {{--@foreach($project as $key=>$value)--}}
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
                <!-- <div class="col-md-12">
                    <div class="col-md-4">
                        <img src="{{ asset('/images/products/test.jpg') }}"  height="200" width="200">
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12">
                            <label>Winter Coat</label><br>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <br>
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.It has survived <br>    not only five centuries, but also the leap into
                            </p>
                            <a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" >
                                <span class="glyphicon glyphicon-usd">  
                                </span> <b> 200.00 </b>  
                                </a>
                        </div>
                        <div class="col-md-12">
                            <a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" class="edit btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-shopping-cart">  
                                </span> <b> Add to Cart </b>  
                            </a>
                            <a href="javascript:void(0)" onclick="deleteRecord('+full.product_id+');" class="edit btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-heart">  
                                </span> <b> Add wishlist </b>  
                            </a>
                        </div>
                    </div>
                </div> -->
                 <!-- product listing end-->
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