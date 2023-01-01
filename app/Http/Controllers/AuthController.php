<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Userform;
use App\Models\User;
use DataTables;

class AuthController extends Controller
{
    // Login Route

    public function index(){
        return view('auth.login');
    }

    // Login Code

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('/userformview');
        }

        return redirect('login')->withError('Login details are not valid');
    }

    // Register Route

    public function register_view(){
        return view('auth.register');
    }


    // register feed data
    public function register(Request $request){
         $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'dob'=>'required',
            'address'=>'required'
        ]);

            // Creating new user

            $users = new User;
        // Here We have write the class name of model we have created to store the data
        // than assign the value of your in the name
            $users->name = $request['name'];
            $users->email = $request['email'];
            $users->password = \Hash::make($request['password']);
            $users->gender = $request['gender'];
            $users->dob = $request['dob'];
            $users->address = $request['address'];
            $users->save();


            // login user here

            if(\Auth::attempt($request->only('email','password'))){
                return redirect('/userformview');
            }
    
            return redirect('register')->withError('Error');
    
    }


    public function view(){
        $usersdata = User::all();
        $data = compact('usersdata');
        return view('userformview')->with($data);
    }


// Update the Function

    public function update(Request $request){

        if ($users = Auth::user()) {
            $users->name = $request['name'];
            $users->email = $request['email'];
            $users->gender = $request['gender'];
            $users->dob = $request['dob'];
            $users->address = $request['address'];
            $users->save();
    
            return redirect('/userformview');
        }
        

        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->gender = $request['gender'];
        $users->dob = $request['dob'];
        $users->address = $request['address'];
        $users->save();

        return redirect('userform');
    }

    // Upload Image

    public function upload(Request $request){

        $data = Auth::user()->profile;
        if ($data == null) {
            $image = $request->profile;
            $name = $image-> getClientoriginalName();
            $image -> storeAs('public/images', $name);

            $image_save->profile = $name;
            $image_save-> save(); 

            return back('userformview');
        }
    }

    // Datatables Shows

    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){

                    if($row->status == 1){
                         return "Active";
                    }else{
                         return "Inactive";
                    }
   
               }) 
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="">
                    <button class="btn btn-success btn-sm">Update</button>
                    </a>' ;
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    // Function Update

    

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }
}
