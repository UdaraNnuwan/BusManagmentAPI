<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;


class UserController extends Controller
{
    //registration new User
   public function register(Request $request){
       $data =$request->validate([
        'name'=>'required|string',
        'email'=>'required|email|unique:Users',
        'password'=>'required|string',
        'role'=>'required',
       ]);

       $user=User::create([
         'name'=>$data['name'],
         'email'=>$data['email'],
         'role'=>$data['role'],
         'password'=>Hash::make($data['password']),  
       ]);//role=1(admin) role=0(user)

       $token = $user->createToken('AssignmentToken')->plainTextToken;
        
       $response=[
           'user'=>$user,
           'token'=>$token,
       ];
        return response($response,201);
        
   }

   // login function
   public function login(Request $request)
   {
        $data =$request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $user=User::where('email',$data['email'])->select('id','name','email','role','password')->first();

        if(!$user || !Hash::check($data['password'],$user->password))
        {
            return response(['message'=>'invalid User'],401);
        }
        else
        {
            $token = $user->createToken('usertoken',[$user->role])->plainTextToken;
            Arr::add($user,'token',$token);
            return response()->json($user,200);
        }


   }
    //log out the system
   public function logout()
   {
        auth()->user()->tokens()->delete();
        return response(['message'=>'Logged Out successfully']);
   }

   //Seen Logged user details token

   public function getuser(Request $request)
   {
        return response()->json(['user'=>$request->user()]);
   }
}
