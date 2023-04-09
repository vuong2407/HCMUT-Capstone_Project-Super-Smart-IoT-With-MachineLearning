<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * save data from input device
     *
     * @param device_id
     */
    public function addInput(Request $request)
    {
        // info($request['value']);
        // $request->validate([
        //     'name' => 'required' ,
        //     'parameter' => 'required' ,
        //     'userName' => 'required'
        // ]);
        // $input = new InputDevice();
        // $input -> name = $request['name'];
        // $input -> parameter = $request['parameter'];
        // $input -> added_by = $request['userName'];
        // $input -> save() ;

        // return response()->json($input);
    }
}
