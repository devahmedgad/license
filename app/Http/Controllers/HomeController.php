<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use Validator;
class HomeController extends Controller {

	public function index()
	{
		return View('admin.index');
	}

	public function Login()
	{
		if(Auth::admin()->check() == true)
		{	
			return redirect()->to(Url('/'));
		}
		return View('auth.login');
	}

	public function doLogin(Request $bag)
	{
		if(Auth::admin()->check() == true)
		{	
			return redirect()->to(Url('/'));
		}
		$validator = Validator::make($bag->all(),[
			    'email'            		=> 'required|email',
				'password'        		=> 'required',
			]);
		if($validator->fails()){
			return response()->json(['scode'=>401,'errors'=>$validator->errors()->all()],202);	
		}
		
		if(Auth::admin()->attempt(['email' => $bag->email , 'password' => $bag->password ]))	
		{
			return response()->json(['scode'=>202,'msg'=>["successfully logged in , redirecting please wait ..."]],202);	
		}
		
	}

	public function Logout()
	{
		if(Auth::admin()->check() == true)
		{	
			Auth::admin()->logout();
			return redirect()->to(Url('login'))->with(['msg'=>'تم تسجيل خروجك بنجاح']);
		}
		return redirect()->to(Url('login'));
	}

}
