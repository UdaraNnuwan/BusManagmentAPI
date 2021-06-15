<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bus_route;
use App\bus_schedule;

class busScheduleController extends Controller
{
    //adding schedule
    public function AddSchedule(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        {   

            $request->validate([
                'busRouteId'=>'required',
                'direction'=>'required',
                'StartTime'=>'required',
                'EndTime'=>'required',
                
            ]);
            $busRouteId=bus_route::find($request->busRouteId);

            if($busRouteId)
            {
            
                    $data=new bus_schedule;
                    $data->bus_route_id  = $request->busRouteId;
                    $data->direction	= $request->direction;
                    $data->start_timestamp=$request->StartTime;
                    $data->end_timestamp=$request->EndTime;
                    $data->save();

                    return response()->json(['message'=>'bus schedule added successful'],404);
                
            }
            else
            {
                return response()->json(['message'=>'Invalid Bus-Route Id'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }

    }

    //updateing Schedule
    public function UpdateSchedule(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        { 
            $data=bus_schedule::find($request->id);
            if($data)
            {
                $request->validate([
                    'busRouteId'=>'required',
                    'direction'=>'required',
                    'StartTime'=>'required',
                    'EndTime'=>'required',
                    
                ]);
                $busRouteId=bus_route::find($request->busRouteId);

                if($busRouteId)
                {
                        $data->bus_route_id  = $request->busRouteId;
                        $data->direction	= $request->direction;
                        $data->start_timestamp=$request->StartTime;
                        $data->end_timestamp=$request->EndTime;
                        $data->update();

                        return response()->json(['message'=>'bus schedule updated successful'],404);
                    
                }
                else
                {
                    return response()->json(['message'=>'Invalid Bus-Route Id'],404);
                }
            }
            else
            {
                return response()->json(['message'=>'Invalid Schedule Id'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }

    //deleting Schedule
    public function DeleteSchedule($id,Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        { 
            $data=bus_schedule::find($id);
            if($data){
                $result=$data->delete();
                

                if($result)
                {
                    return response()->json(["result"=>"Bus Schedule  Deleted"]);
                }
                else
                {
                    return response()->json(["result"=>"Bus Schedule  Delete Failed"]);
                } 
            }
            else
            {
                return response()->json(["result"=>"Cannot find bus schedule "]);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }

    //retriving all data from schedule
    public function show(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('2'))
        {     
            $Schedule=bus_schedule::all();
            return response()->json($Schedule);
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }
}
