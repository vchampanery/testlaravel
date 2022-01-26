<?php

namespace App\Http\Controllers;

use App\Models\shopowner;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    public function index(){
        return view('login.index')->with('message','');
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

            $shopownerObj = shopowner::where('shopowner_password',$request->password)
            ->where('shopowner_username',$request->username)->first();
            
            if($shopownerObj){
                session([
                    'user_login' => true,
                    'shopowner_email' => $shopownerObj->email,
                    'shopowner_role'=> $shopownerObj->shopowner_role,
                    'shopowner_name'=> $shopownerObj->shopowner_name,
                    'shopowner_id'=> $shopownerObj->shopowner_id,
                    'shopowner_currency'=> $shopownerObj->shopowner_currency,
                    'cart' => []
                ]);
            } else{
                return redirect(route('login.index'))->with('flashMessage', trans('auth.failed'));

                // return redirect()->route('login.index')->with('message',trans('auth.failed'));
            }
            
        }
        //set language
        App::setLocale(session('locale',$shopownerObj->shopowner_language));
       
        return view('home.index');
    }
    public function logout(){
        Session::flush();
        // session(['user_login' => false,'shopowner_email' => false]);
        return view('home.index');
    }
}
