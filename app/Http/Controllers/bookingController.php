<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Publisher;
use Illuminate\Database\Eloquent\Model;;
use App\bus_seat;
use App\User;
use App\bus_schedule;
use App\bus_schedule_booking;
use Carbon\Carbon;


class bookingController extends Controller
{
    //Add New Booking
    public function AddBooking(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('2'))
        {
            $request->validate([
                'SeatId'=>'required',
                'UserId'=>'required',
                'ScheduleId'=>'required',
                'SeatNumber'=>'required',
                'Price'=>'required',
                'Status'=>'required',
                
            ]);
        
            $UserId=User::find($request->UserId);
            $scheduleId=bus_schedule::find($request->ScheduleId);
            $seat_number=bus_seat::where([['id','=',$request->SeatId],['seat_number','=',$request->SeatNumber]])->first();

            if($UserId && $scheduleId && $seat_number)
            {
            
                    $data=new bus_schedule_booking;
                    $data->bus_seat_id = $request->SeatId;
                    $data->user_id= $request->UserId;
                    $data->bus_schedule_id=$request->ScheduleId;
                    $data->seat_number=$request->SeatNumber;
                    $data->	price=$request->Price;
                    $data->status=$request->Status;
                    $data->save();
                
                    $seat_number->availability=0;
                    $seat_number->update();

                    return response()->json(['message'=>'bus booking successful'],200);
                
            }
            else
            {
                return response()->json(['message'=>'Invalid Bus-Booking Faild'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }


    }

    //Cancle Booking
    public function CancleBooking($id,Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('2'))
        {
            $busBooking=bus_schedule_booking::find($id);

            if($busBooking){
            $busScheduleId=$busBooking->bus_schedule_id;
            $scheduleTime=bus_schedule::where([['id','=',$busScheduleId]])->first();
            $StartTime=$scheduleTime->start_timestamp;
            $now=date('H:i:s', time());

        // $TimeDifference= $scheduleStartTime->diffInHours($now)->format('%H:%I:%S');

            $to = \Carbon\Carbon::createFromFormat('H:s:i',$StartTime);
            $from = \Carbon\Carbon::createFromFormat('H:s:i',$now);
            $diff_in_hours = $to->diffInHours($from);
            

            if($diff_in_hours>10){
                $result=$busBooking->delete();
                
                

                if($result)
                {
                    return ["result" => 'Bus Booking Cancle Success'];
                }
                else
                {
                    return ["result"=>"Bus Booking Cancle Faild"];
                } 
            }
            else
            {
                return ["result"=>"Cannot Bus Booking Cancle(Less than 10 hrs) "];
            }

            }else{
                return ["result"=>"No any Booking This Id"];
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }


    }

    //book Schedule 
    public function book(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('2'))
        {
            $bookSchedule=bus_schedule_booking::where([['status','=',0]])->get();
            return response()->json($bookSchedule);
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }
    
    //my booking orders
    public function mybook($id,Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('2'))
        {
            $mybook=bus_schedule_booking::where([['user_id','=',$id]])->get();
            return response()->json($mybook);
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }
}
