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
                    <h1>{{$data['action']}} Product</h1>
                </div>
                <div class="col-md-6">
                <a href="" class="btn btn-blue-no-border-radius crawlall pull-right" >Add</a> |
                    <a href="{{route('login.logout')}}" class="btn btn-blue-no-border-radius crawlall pull-right" role="button" data-toggle="tooltip" >Logout</a>
                    
                </div>
            </div>
        </div>
        <div class="row content">
                <form role="form" method="POST" class="form-inline" enctype="multipart/form-data" action="{{ route('product.addedit')  }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="action" value="{{$data['action']}}">
                    <input type="hidden" name="product_id" value="@if(isset($product->product_id)){{$product->product_id}}@endif">
                    <div class="col-md-12 center">
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1"><span class="text-danger">*</span>Product Name :</label>
                                <input type="text" class="" id="product_name" name="product_name" 
                                value="@if(isset($product->product_name)){{$product->product_name}}@endif" 
                                placeholder=" Enter Product name">
                                <div class="alert-danger mt-1 mb-1">{{ $errors->first('product_name') }}</div>
                                
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1"><span class="text-danger">*</span>Category :</label>
                                <!-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> -->
                                <select class="form-select" name="product_category" id="product_category" aria-label="Default select example">
                                @foreach($data['category'] as $key=>$value)
                                    <option value="{{$key}}"
                                    @if((isset($product->product_category) && $product->product_category==$key) || (old('product_category')==$key)) selected="selected" @endif
                                    
                                    >{{$value}}</option>
                                @endforeach   
                                </select>
                                <div class="alert-danger mt-1 mb-1">{{ $errors->first('product_category') }}</div>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1"><span class="text-danger">*</span>Sub category :</label>
                                <!-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> -->
                                <select class="form-select" name="product_subcategory" aria-label="Default select example">
                                @foreach($data['subcategory'] as $key=>$value)
                                    <option value="{{$key}}"
                                    @if((isset($product->product_subcategory) && $product->product_subcategory==$key) || (old('product_subcategory')==$key)) selected="selected" @endif
                                    >{{$value}}</option>
                                @endforeach   
                                </select>
                                <div class="alert-danger mt-1 mb-1">{{ $errors->first('product_subcategory') }}</div>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1"><span class="text-danger">*</span>Description :</label>
                                <!-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> -->
                                <textarea rows="7" cols="40">@if(isset($product->product_description)){{$product->product_description}}@endif</textarea>
                                <div class="alert-danger mt-1 mb-1">{{ $errors->first('product_description') }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1"><span class="text-danger">*</span>Price :</label>
                                <!-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> -->
                                <input type="text" class="" id="product_price" name="product_price" 
                                value="@if(isset($product->product_price)){{$product->product_price}}@else{{ old('product_price') }}@endif" placeholder="Enter Price">
                                <div class="alert-danger mt-1 mb-1">{{ $errors->first('product_price') }}</div>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="inlineCheckbox1"><span class="text-danger">*</span>Image :</label>
                                <input type="file" name="product_image" placeholder="Choose image" id="product_image"
                                value="@if(isset($product->product_image)){{$product->product_image}}@else{{ old('product_image') }}@endif">
                                <span class="alert-danger ">
                                    (Image must be with extension jpg,png,jpeg,gif,svg and Size must be less than < 2MB )</span>
                                <!-- <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> -->
                                @php
                                $imagename =(isset($product->product_image))?$product->product_image:old('product_image');
                                
                                @endphp
                                <img src="{{ asset('storage/images/products/')."/".$imagename }}"  
                                height="100" width="100" id="preview_image">
                                <input type="hidden" name="old_image" value="@if(isset($product->product_image)){{$product->product_image}}@else{{ old('product_image') }}@endif" >
                                <div class="alert-danger mt-1 mb-1">{{ $errors->first('product_image') }}</div>
                            </div>
                            <div class="form-check form-check-inline">
                            
                                <label class="form-check-label" for="inlineCheckbox1">Status :</label>
                                <input class="form-check-input" type="checkbox" name="inlineCheckbox1" id="inlineCheckbox1" value="option1">
                                <div class="alert-danger mt-1 mb-1">{{ $errors->first('inlineCheckbox1') }}</div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12 center">
                        <div class="col-md-6">
                            
                            <input type="submit" class="left" class="btn btn-primary btn-sm" value="submit">
                            <a href="{{ route('product.indexYjr') }}" class="btn btn-primary btn-sm">cancel</a>

                        </div>
                    </div>      
                </form>
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
    
   
    $('#product_image').on('change',function(){
        // const [file] = $('#product_image').files;
        // if (file) {
        //     $('#preview_image').src(URL.createObjectURL(file));
            
        // }
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#preview_image').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
    }); 
    
</script>

</html>