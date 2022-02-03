<?php

namespace App\Http\Controllers;


use App\Models\systemuser;
use App\Models\userimage;
use Validator;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class SystemUserController extends Controller
{
    
    public function index(){
        $message="Welcome to Logic soft";
        return view('login.index')->with('successMsg', $message);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $projectObj = systemuser::get();
        
        $data = [];
        foreach($projectObj as $kd=>$vd){
            //fetch image in systemuser
            $ineerdata = [];
            $ineerdata['id'] = $vd->id;
            $imgObj = userimage::where('user_id',$vd->id)->get();
            foreach($imgObj as $ii=>$iv){
                $ineerdata['image'][]=$iv->name;
            }
            $ineerdata['name'] = $vd->name;
            $data[]=$ineerdata;
        }
        return view('user.list')->with('data',$data);
    }
    public function delete(Request $req,$id){
        $sysTe = systemuser::where('id',$id)->first();
        
        //remove image
        $getImgList=userimage::where('user_id',$id)->get();
        foreach($getImgList as $kg=>$kv){
            $path = Storage::path('public\users\\'.$kv->name);
            unlink($path);
        }
        $r= $sysTe->delete();
        $message="User deleted successfully";

        return redirect()->route('systemuser.list')->with('flashMessagesuccess', $message);
    }
    //add expense

    public function addexpense(Request $req){
        dd("e");

        dd($req->all());
        $sysTe = systemuser::where('id',$id)->first();
        
        //remove image
        $getImgList=userimage::where('user_id',$id)->get();
        foreach($getImgList as $kg=>$kv){
            $path = Storage::path('public\users\\'.$kv->name);
            unlink($path);
        }
        $r= $sysTe->delete();
        $message="User deleted successfully";

        return redirect()->route('systemuser.list')->with('flashMessagesuccess', $message);
    }
    
}
