<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bus;
use App\bus_seat;

class seatController extends Controller
{
    //Adding to seat Details
    public function AddSeat(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        {
            $request->validate([
                'busId'=>'required',
                'seatNumber'=>'required',
                'Price'=>'required',
            ]);
            $busId=bus::find($request->busId);

            if($busId)
            {
            
                    $data=new bus_seat;
                    $data->seat_number= $request->seatNumber;
                    $data->price= $request->Price;
                    $data->availability=1;
                    $data->bus_id=$request->busId;
                    $data->save();

                    return response()->json(['message'=>'bus-seat detail added successful'],200);
                
            }
            else
            {
                return response()->json(['message'=>'Invalid BusId'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }


    }

    //Update Seat Details
    public function UpdateSeat(Request $request){
        $user=$request->user();
        if($user->tokenCan('1'))
        {
            $request->validate([
                'busId'=>'required',
                'seatNumber'=>'required',
                'Price'=>'required',
            ]);
            $data= bus_seat::find($request->id);

            if($data)
            {
                $busId=bus::find($request->busId);

                if($busId)
                {
        
                    $data->seat_number= $request->seatNumber;
                    $data->price= $request->Price;
                    $data->availability=$request->availability;
                    $data->bus_id=$request->busId;
                    $data->update();

                    return response()->json(['message'=>'bus-seat detail Updated successful'],200);
                }
                else
                {
                    return response()->json(['message'=>'Invalid Bus Id'],404);
                }
                
            }
            else
            {
                return response()->json(['message'=>'Invalid Bus Seat Id'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }

    }

    //Deleting Seat Details

    public function DeleteSeat($id,Request $request){
        $user=$request->user();
        if($user->tokenCan('1'))
        {
            $data = bus_seat::find($id);
            if($data){
                $result=$data->delete();
                

                if($result)
                {
                    return ["result"=>"Bus-Seat Details Deleted"];
                }
                else
                {
                    return ["result"=>"Bus-Seat Details Delete Failed"];
                } 
            }
            else
            {
                return ["result"=>"Cannot find bus Seat"];
            }  
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        } 
    }
}
