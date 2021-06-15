<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\routes;

class RouteController extends Controller
{
    //route add
    public function AddRoute(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        { 
            $request->validate([
                'nodeone'=>'required',
                'nodetwo'=>'required',
                'RouteNumber'=>'required',
                'distance'=>'required',
                'time'=>'required',
    
            ]);
    
            $data= new routes;
            $data->node_one=$request->nodeone;
            $data->node_two=$request->nodetwo;
            $data->route_number=$request->RouteNumber;
            $data->distance=$request->distance;
            $data->time=$request->time;
            $result = $data->save();
    
            if($result){
                return  response()->json(["result"=>"Route Added"]);
            }
            else
            {
                return response()->json(["result"=>"Route Added Fail"]);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }

    }

    //delete Route

    public function DeleteRoute($id,Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        {    
            $data =routes::find($id);
            if($data){
                $result=$data->delete();
                

                if($result)
                {
                    return ["result"=>"Bus Route Deleted"];
                }
                else
                {
                    return ["result"=>"Bus Route Delete Failed"];
                } 
            }
            else
            {
                return ["result"=>"cannot find any busroute"];
            }   
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }

    //modify Route
    public function ModifyRoute(Request $request)
    {
        $user=$request->user();
        if($user->tokenCan('1'))
        {    
          
            $data =  routes::find($request->id);
            if($data)
            {
                $request->validate([
                    'nodeone'=>'required',
                    'nodetwo'=>'required',
                    'RouteNumber'=>'required',
                    'distance'=>'required',
                    'time'=>'required',
                ]);
                $data->node_one=$request->nodeone;
                $data->node_two=$request->nodetwo;
                $data->route_number=$request->RouteNumber;
                $data->distance=$request->distance;
                $data->time=$request->time;
                $data->update(); 

                return response()->json(['message'=>'Route details Updated'],200);
            }else{
                return response()->json(['message'=>'No Route Found'],404);
            }
        }
        else
        {
            return response()->json(['message'=>'Invalid user'],404);
        }
    }

}
