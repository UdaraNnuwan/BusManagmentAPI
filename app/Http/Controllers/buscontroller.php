<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bus;

class buscontroller extends Controller
{
    //add Details
    public function AddBus(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        {  
            $request->validate([
                'name'=>'required',
                'type'=>'required',
                'vehicleNumber'=>'required',
    
            ]);
    
            $data= new bus;
            $data->name=$request->name;
            $data->type=$request->type;
            $data->vehical_number=$request->vehicleNumber;
            $result = $data->save();
    
            if($result){
                return response()->json(["result"=>"Bus Added"]);
            }
            else
            {
                return response()->json(["result"=>"Bus Added Fail"]);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }

    //update bus details
    public function update(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        {  
            $data =  bus::find($request->id);
            if($data)
            {
                $data->name = $request->name;
                $data->type = $request->type;
                $data->vehical_number = $request->vehicleNumber;
                $data->update(); 

                return response()->json(['message'=>'Bus details Updated'],200);
            }
            else
            {
                return response()->json(['message'=>'No Bus Found'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }

    // Delete Bus Details
   public function DeleteBusDetails($id,Request $request)
   {
       $user=$request->user();
       if($user->tokenCan('1'))
       { 
            $datadel =bus::find($id);
            if($datadel){
                $result=$datadel->delete();
                

                if($result)
                {
                    return response()->json(["result"=>"Bus Data Deleted"]);
                }
                else
                {
                    return response()->json(["result"=>"Bus Data Delete Failed"]);
                }
            }else{
                return response()->json(["result"=>"Bus Data Not Available"]); 
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
   }
}
