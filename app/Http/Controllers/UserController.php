<?php

namespace App\Http\Controllers;

use App\Models\Trains;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Showing Register Form
    public function register(){
        return view('users.form')->with("form","register");
    }
    //Storing User
    public function store(Request $request){
        // if ($request->email=="karunakarmishra2006@gmail.com" || str_contains($request->name,"admin")) {
        //     return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
        // }
        $users=User::get();
        foreach ($users as $user) {
            if ($user->email==$request->email) {
                return back()->withErrors(['email'=>'Already Have An Account With This Email '])->onlyInput('email');
            }
        }

        $formFeilds=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);
        // $contains=(int)strpos($formFeilds['name'],"admin");
        //Hash Password
        $formFeilds['password']=bcrypt($formFeilds['password']);

        //Create User
        $user=User::create($formFeilds);

        //login
        auth()->login($user);

        return redirect('/')->with('message','User Created And Logged In.');
    }
    //logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You Have Been Logged Out !');
    }
    //show login form
    public function login(){
        return view('users.form')->with("form","login");
    }
    //authenticate user
    public function authenticate(Request $request){
        $formFeilds=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if($formFeilds["email"]=="karunakarmishra2006@gmail.com"){
            return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
        }
        if(auth()->attempt($formFeilds)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in !');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }
    public function authenticateAdmin(Request $request){
        $formFeilds=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if(strtolower($formFeilds["email"])=="karunakarmishra2006@gmail.com" && $formFeilds["password"]=="9920096388"){
            if(auth()->attempt($formFeilds)){
                $request->session()->regenerate();
                return redirect('/')->with('message','Welcome Back Admin!');
            }
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }
    //Shoing Edit User Form
    public function edit(){
        return view('users.edit');
    }
    //Updating User
    public function update(Request $request){
        $formFeilds=$request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email'],
            'password'=>'required|confirmed|min:6'
        ]);
        
        //Hash Password
        $formFeilds['password']=bcrypt($formFeilds['password']);
        if($formFeilds['password']==auth()->user()->password){
            return back()->withErrors(['password'=>'Password Must Be Unique'])->onlyInput('password');
        }

        //Create User
        $user=User::where("id",auth()->user()->id)->first();
        $user->update($formFeilds);
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','User Updated Successfully.');

    }


    //Admin Controllers

    //show admin login form
    public function adminLogin(){
        return view('users.form')->with("form","admin");
    }

}
