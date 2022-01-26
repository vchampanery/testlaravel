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

        
        <div class="row content">
            <div class="col-md-12">
            <table class="table  data-table  nowrap">
                            <thead>
                                <tr>
                                    <th class="col-md-1">Thumb</th>
                                    <th class="col-md-6">Name</th>
                                    <th class="col-md-1">SKU</th>
                                    <th class="col-md-1">QTY</th>
                                    <th class="col-md-1">UNIT PRICE</th>
                                    <th class="col-md-2">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$value)
                                <tr>
                                    <td class="align-middle">
                                    @if($value['thumb'])    
                                    <img src="{{ asset('storage/images/products/')."/".$value['thumb'] }}"  height="100" width="100">
                                    @endif</td>
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
            </table>
                    
            </div>
            <div class="col-md-12">
                <div class="col-md-6" >
                <a href="{{route('product.userList')}}" class="edit btn btn-primary btn-sm">Continue Shopping</a>
                </div>
                <div class="col-md-6" style="text-align:right;">
                <a href="{{route('product.order')}}" class="edit btn btn-primary btn-sm right">Checkout</a>
                </div>
            </div>
        </div>
        <div class="row content">
            
        </div>
         
         
         
        
       
        
    </div>



    
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('.data-table').DataTable({
        "aaSorting": false,
        "paging": false,
        "bInfo": false,
        "bSort": false,
        });
    });
    function updateqty($id)
    {
        var fee=$('#shoppingfee').val();

    }
    function updateqty(id){
        var fee=$('#shoppingfee').val();
        // var qty=$('#qty').val();
        var qty = $('input[name="qty[]"]').map(function () {
            return this.value; // $(this).val()
        }).get();
        var pdUrl = "{{route('product.updateqty')}}";
        console.dir(qty);
        $.ajax({
            url        : pdUrl,
            type       : 'POST',
            data       : {_token: "{{ csrf_token() }}",'id':id,'fee':fee,'qty':qty},
            beforeSend : function () { 
                console.dir("test start");
            },
            success : function (response) {
                // console.dir(response);
                $('#subtotal').val(response.subtotal);
                $('#shoppingfee').val(response.sfee);
                $('#grandtotal').val(response.total);
                
            },
            complete   : function () {
                console.dir("test complete");
            }
        });
    }
</script>

</html>