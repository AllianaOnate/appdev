<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
class LoginController extends Controller
{
    //use AuthenticatesUsers;
    
    //Views
    public function LoginView(){
        return view('login.loginpage');
    }

    
    //Post
    public function login(Request $request){
        /*$data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|password'
        ]);*/

        $input = $request->all();
        $validate = Validator::make($input, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $input['email'])->first();

        if($user || Hash::check($input['password'], $user->password)){
            $user_role = $user->role;
            if($user_role == 1){
                return redirect('/admin');
            }else if($user_role ==2){
                return redirect('/user');
            }
        }
    }
}
