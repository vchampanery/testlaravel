<?php

namespace App\Http\Controllers;

use App\Models\expense;
use App\Models\systemuser;
use App\Models\userimage;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;
class LoginController extends Controller
{
    use HasApiTokens;
       
    public function index(){
        $message="Welcome to Unicode";
        return view('login.index')->with('successMsg', $message);
    }
    public function signup(){
        
        return view('login.signup');
    }
    public function addexpense(Request $request){
        $allParam = $request->all();

        $partner = explode(',',$allParam['partner']);
        $part = explode(',',$allParam['part']);
        $type = $allParam['type'];
        $amount = $allParam['amount'];
        $finalArray=[];
        if($type == 1) //Equal
        { //1.EQUAL, EXACT or PERCENT
            $totalmember = count($partner);
            $portion = $amount/$totalmember;//each 
            $finalArray = array_fill_keys($partner,$portion);
            // dd($finalArray); 

        }elseif($type == 2) { // Exact
            
            foreach($partner as $kp=>$vp){
                $finalArray[$vp] =$part[$kp]; 
            }
           
        }elseif($type == 3) { // Percent
            foreach($partner as $kp=>$vp){
                $finalArray[$vp] = ($amount*$part[$kp])/100; 
            }
        }
        // dump($finalArray);
        foreach($finalArray as $kf=>$vf){ 
            $inst = [];
            $inst['payee']= $allParam['payee'];
            $inst['user']= $kf;
            $inst['amount']= round($vf,2);
            $inst['status'] = 1;
            $exper = expense::create($inst);
        }
        dd("test end");
    }
    public function getdetail(Request $request){
        $allParam = $request->all();
        $payee=$allParam['payee'];
        $user=$allParam['user'];
        $owe = expense::where('user',$user)->where('payee',$payee)->where('status',1)
                ->select(DB::raw('sum(amount) as amount'))
                ->groupBy('user')
                ->first();
        $total_owe =0; 
        if($owe){
            $total_owe = $owe->amount;
        }
        $lend = expense::where('user',$payee)->where('payee',$user)->where('status',1)
                ->select(DB::raw('sum(amount) as amount'))
                ->groupBy('user')
                ->first();
        $total_lend =0;
        if($lend){
            $total_lend = $lend->amount;
        }
        dump("total owes : ".$total_owe);
        dump("total lend : ".$total_lend);
        $total = $total_owe - $total_lend;
        dump("total ".$total);
        dd();
    }
    public function register(Request $request){
        
        $messages = [
            'name' => 'name can not be empty',
            'username' => 'username can not be empty',
            'email' => 'email can not be empty',
            'password' => 'password can not be empty',
        ];
        $validator = Validator::make($request->all(),
            array(
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'username' => 'required|string|max:255',
                'password' => 'required|string|max:255',
                '_token'    =>  'required|max:255'//For to prevent buffer overflow
            ),
            $messages
        );        
		if ($validator->fails())
		{
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            //insert
            $data = $request->all();
            // dd($data);
            // unset($data);
            //insert user
                $user = [];
                $user['name'] = $data['name'];
                $user['username'] = $data['username'];
                $user['email'] = $data['email'];
                $user['password'] = $data['password'];
                $userObj = systemuser::create($user);
                
            //get userid
            $userId =$userObj->id;
            // insert into image
                foreach($data['image'] as $k=>$v){
                    $image = [];
                    $path = $v->store('public/users');
                    $image['name'] =$v->hashName();
                    $image['user_id'] =$userId;
                    $imgObj = userimage::create($image);
                }
            $message="User register successfully";
            return redirect()->route('login.index')
                             ->with('flashMessagesuccess', $message);

        }
    }
    public function loginsubmit(Request $request){
        
        $messages = [
            'username' => 'username can not be empty',
            'password' => 'password can not be empty',
        ];
        $validator = Validator::make($request->all(),
            array(
                'username' => 'required|string|max:255',
                'password' => 'required|string|max:255',
                '_token'    =>  'required|max:255'//For to prevent buffer overflow
            ),
            $messages
        );        
		if ($validator->fails())
		{
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            // App::setLocale('es');

            $userObj = systemuser::where('password',$request->password)
            ->where('name',$request->username)->first();
            
            if($userObj){
                session([
                    'user_login' => true,
                    'username' => $userObj->username,
                    'id'=> $userObj->id
                ]);
                
            } else{
                return redirect(route('login.index'))->with('flashMessage', trans('auth.failed'));
            }
            
        }
        //set language
        // App::setLocale(session('locale',$shopownerObj->shopowner_language));
       
        return view('home.index');
    }
    public function logout(){
        Session::flush();
        // session(['user_login' => false,'shopowner_email' => false]);
        return view('home.index');
    }
}
