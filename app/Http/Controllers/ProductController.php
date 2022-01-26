<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderitem;
use App\Models\product;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DataTables;

class ProductController extends Controller
{
    public function list(){
        $projectObj = product::get();
        return view('product.index')->with('project',$projectObj);
    }
    public function ownerList(){
        $projectObj = product::get();
        return view('product.ownerlist')->with('project',$projectObj);
    }
    public function userList(){
        $data = product::get();
        return view('product.userList')->with('data',$data);
       
    }
    public function order(){
        $data = [];
        $cart = session('cart');
        $cartqty = session('qty');
        $custId = session('shopowner_id');
        $total = session('total');
        $orderObj = order::create(array('customer_id' => $custId,'total' => $total,'price_price'=>$total));
        // dd( $orderObj );
        $orderId = $orderObj->orders_id;
        foreach($cartqty as $key=>$val){
            $productObj = product::where('product_id',$cart[$key+1])->first();
            $orderItem=[];
            $orderItem['orders_id']=$orderId;
            $orderItem['product_id']=$cart[$key+1];
            $orderItem['qty']=$val;
            $orderItem['price_price']=$productObj['product_price']*$val;
            // dd($orderItem);
            $orderItemObj = orderitem::create($orderItem);
        }
        session(['cart'=> [],'qty'=>[],'subtotal'=> 0,'sfee'=>0,'total'=>0]);
        $data['order_id']=$orderId;
        $data['total']='$'.number_format($total, 2, ',', '.');
        $data['date']=date('F d,Y', strtotime($orderObj->created_at));
        return view('product.order')->with('data',$data)->with('message','Thank you,Your order has been completed');
    }
    public function addtoCart($id)
    {
        $cardId = session('cart');
        $cardId[$id]=$id;
        session(['cart'=> $cardId]);
        return redirect()->route('product.cart');
    }
    public function cart(){
        
        $cardId = session('cart');
        $projectObj = product::WhereIn('product_id',$cardId)->get();
        
        $data = [];
        $rawData1['thumb'] ="";
        $rawData1['description'] ="";
        $rawData1['sku'] ="";
        $rawData1['qty'] ="";
        $rawData1['unitprice']="";
        $rawData1['total'] ="";
        $totalprice =0;
        $productFee=0;
        foreach($projectObj as $key =>$value){
            $rawData =[];
            $rawData['thumb'] =$value->product_image;
            $rawData['description'] ="<h3>$value->product_name</h3>
            <h5>Color :blue</h5>
            <h5>Size : S</h5>";
            $rawData['sku'] =123325; //static
            $rawData['qty'] ='<input class="col-md-12" type="number" name="qty[]" id="qty" value="1" min="1" onchange="updateqty('.$value->product_id.')"> ';
            $rawData['unitprice']="<span class='glyphicon glyphicon-usd'> 
            </span> <b> $value->product_price </b>";
            $rawData['total'] ="<span class='glyphicon glyphicon-usd'> 
            </span> <b> $value->product_price </b>";
            $data[]=$rawData;

            $totalprice = $totalprice+$value->product_price;
            $productFee = $productFee+10;
        }
        $grandTotal = $totalprice+$productFee;
        $unit = $rawData1;
        $unit['unitprice'] = 'subtotal';
        $unit['total'] = '<input readonly class="col-md-12" type="text" value="$'.number_format($totalprice, 2, ',', '.').'" name="shoppingfee" id="subtotal"> ';
        $data[] = $unit;
        $sfee = $rawData1;
        $sfee['qty'] = '($10/QTY)  ';
        $sfee['unitprice'] = 'shipping fee ';
        $sfee['total'] = '<input readonly class="col-md-12" type="text" value="$'.number_format($productFee, 2, ',', '.').'" name="shoppingfee" id="shoppingfee"> ';
        $data[] = $sfee;
        $gtotal = $rawData1;
        $gtotal['unitprice'] = 'Grand total';
        $gtotal['total'] = '<input readonly class="col-md-12" type="text" value="$'.number_format($grandTotal, 2, ',', '.').'" name="grandtotal" id="grandtotal"> ';
        $data[] = $gtotal;
        return view('product.cart')->with('data',$data);
    }
    public function detail($id){
        $data = [];
        $productObj = product::where('product_id',$id)->first();

        return view('product.detail')->with('data',$productObj);
    }
    public function updateqty(Request $request){
        $id = $request->id;
        $fee = $request->fee;
        $qty = $request->qty;
        // dd($qty);
        $cardId = session('cart');
        $lenght=count($cardId);
        $product = product::whereIn('product_id',$cardId)->get();
        $subtotal = $total= $sfee = 0;
        foreach($product as $key=>$value){
            if($akey = array_search($value->product_id,$cardId)){
                // dump($qty);
                // dump($akey);
                // dump($value->product_id,$cardId);
                // dd();
                $pqty = $qty[$akey-1];
                $subtotal =$subtotal + ($pqty*$value->product_price);
                $sfee = $sfee + ($pqty*10);
            }
        }
        $total = $subtotal + $sfee;
        session(['qty'=>$qty,'subtotal'=> $subtotal,'sfee'=>$sfee,'total'=>$total]);
        return ['subtotal'=>'$'.number_format($subtotal, 2, ',', '.'),
        'total'=>'$'.number_format($total, 2, ',', '.'),
        'sfee'=>'$'.number_format($sfee, 2, ',', '.')];

    }
    public function addedit(Request $request){
        $productDetail = $request->all();
        $action = $productDetail['action'];
        unset($productDetail['_token']);
        unset($productDetail['action']);
        // dd($request->file('product_image'));
        $validator = Validator::make($request->all(),
            array(
                "product_name" => "required|string|max:255",
                "product_category" => "required|string|max:255",
                "product_subcategory" => "required|string|max:255",
                "product_price" => "required|integer",
                "product_image" => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            )
        );    
        // dd($validator->messages());    
		if (!$validator->fails())
		{ 
            if ($action == "Add"){
                // dd($productDetail);
                $productDetail['product_status'] = true;
                // $path = $request->file('product_image')->store('public/images/products1');
                // $path = Storage::disk('public')->put('images/products', $request->file('product_image'));
                // $productDetail['product_image'] = $request->file('product_image');
                // Storage::move($oldfilename, $dest.$newImageName);
                // dd($request->file('product_image'));

                $path = $request->file('product_image')->store('public/images/products');
                // $productDetail['product_image1'] =$productDetail['product_image']->getRealPath();
                // $productDetail['product_image11'] =$productDetail['product_image']->getClientOriginalName();
                $productDetail['product_image'] =$productDetail['product_image']->hashName();
                // dd($productDetail);
                // dd("test");
                unset($productDetail['old_image']);
                $product = product::create($productDetail);
            }else if($action == "Edit"){
                //upload image
                $path = $request->file('product_image')->store('public/images/products');
                $productDetail['product_image'] =$productDetail['product_image']->hashName();
                $productDetail['product_status'] = true;
                //remove old image
                $path = Storage::path('public\images\products\\'.$productDetail['old_image']);
                unlink($path);
                unset($productDetail['old_image']);
                $productObj =product::where('product_id', $productDetail['product_id'])
                ->update($productDetail);
            }      
            return redirect()->route('product.list');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function delete(Request $request){
        
        $id = $request->id;
        $product = product::where('product_id',$id)->first();
        //remove img
        $path = Storage::path('public\images\products\\'.$product->product_image);
        unlink($path);
        $product = product::where('product_id',$id)->delete();
        return true;
    }
    public function test1(){
        echo "your are in test1";
    }
    public function test2(){
        echo "your are in test2";
    }
    public function add(){
        $data['action'] = 'Add';
        $data['category'] = config('constants.category');
        $data['subcategory'] =config('constants.subcategory');
        return view('product.add')->with('data',$data);
    }
    public function edit(Request $request,$id){
        
        $product = product::where('product_id',$id)->first();
        $data['action'] = 'Edit';
        $data['category'] = config('constants.category');;
        $data['subcategory'] =config('constants.subcategory');
        return view('product.add')->with('product', $product)->with('data',$data);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexYjr(Request $request)
    {
        if ($request->ajax()) {
            $data = product::select('*');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                           $btn = '<a href="javascript:void(0)" onclick="deleteRecord();" class="edit btn btn-primary btn-sm">Delete</a>
                           <a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                            return $btn;
                    })->rawColumns(['action'])
                    ->make(true);
        }
        return view('product.ownerlist1');
    }
}
