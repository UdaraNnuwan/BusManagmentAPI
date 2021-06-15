<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bus;
use App\routes;
use App\bus_route;

class busrouteController extends Controller
{
    //bus routes mapping
    public function Route(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        { 
            $request->validate([
                'busId'=>'required',
                'routeId'=>'required',
                'Status'=>'required',
            ]);
            $busid=$request->busId;
            $routeid=$request->routeId;
            $status=$request->Status;

            $busdata=bus::find($busid);
            $routedata=routes::find($routeid);

            if($busdata)
            {
                if($routedata)
                {
                    $data=new bus_route;
                    $data->bus_id = $busid;
                    $data->route_id	= $routeid;
                    $data->status=$status;
                    $data->save();

                    return response()->json(['message'=>'bus route added successful'],200);
                }
                else
                {
                    return response()->json(['message'=>'Invalid Route Id'],404);
                }
            }
            else
            {
                return response()->json(['message'=>'Invalid Bus Id'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }

    //status update
    public function UpdateStatus(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        { 
            $data=bus_route::find($request->id);
            if($data)
            {


                $busid=$request->busId;
                $routeid=$request->routeId;
                $status=$request->Status;

                $busdata=bus::find($busid);
                $routedata=routes::find($routeid);

                if($busdata)
                {
                    if($routedata)
                    {
                    
                        $data->bus_id = $busid;
                        $data->route_id	= $routeid;
                        $data->status=$status;
                        $data->update();

                        return response()->json(['message'=>'bus-route update successful'],404);
                    }
                    else
                    {
                        return response()->json(['message'=>'Invalid Route Id'],404);
                    }
                }
                else
                {
                    return response()->json(['message'=>'Invalid Bus Id'],404);
                }
            }
            else
            {
                return response()->json(['message'=>'cannot Find bus-route id'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }

    }

    //delete Route Details
    public function DeleteRoute($id,Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        { 
            $data = bus_route::find($id);
            if($data){
                $result=$data->delete();
                

                if($result)
                {
                    return response()->json(["result"=>"Bus-Route Deleted"]);
                }
                else
                {
                    return response()->json(["result"=>"Bus-Route Delete Failed"]);
                } 
            }
            else
            {
                return response()->json(["result"=>"Cannot find bus route"]);
            }   
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }

}
