<?php

namespace App\Http\Controllers;

use App\Models\InputDevice;
use App\Models\OutputDevice;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    
    /**
     * Show the form add input device
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAddInput()
    {
        return view('admin.input-device');
    }

    /**
     * save form add input device
     *
     * @param form data
     */
    public function addInput(Request $request)
    {
        $request->validate([
            'name' => 'required' ,
            'parameter' => 'required' ,
            'userName' => 'required'
        ]);
        $input = new InputDevice();
        $input -> name = $request['name'];
        $input -> parameter = $request['parameter'];
        $input -> added_by = $request['userName'];
        $input -> save() ;

        return response()->json($input);
    }

    /**
     * get all input device
     *
     * @param none
     */
    public function getDataInput(Request $request)
    {
        $data = InputDevice::where('id','>',0)->get();

        return response()->json($data);
    }

    /**
     * delete input device selected
     *
     * @param deviceId
     */
    public function deleteInput(Request $request)
    {
        $result = [
            'status' => 'error',
        ];

        $deviceId = $request -> id ;
        $data = InputDevice::where('id', '=', $deviceId)-> delete() ;
        // info($data) ;
        // $data = InputDevice::where('id','<',10)->get();
        
        return response()->json($result, 200);
    }

    /**
     * Show the form add input device
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAddOutput()
    {
        return view('admin.output-device');
    }

    /**
     * save form add input device
     *
     * @return respone json
     */
    public function addOutput(Request $request)
    {
        $request->validate([
            'name' => 'required' ,
            'parameter' => 'required' ,
            'userName' => 'required'
        ]);
        $output = new OutputDevice();
        $output -> name = $request['name'];
        $output -> parameter = $request['parameter'];
        $output -> added_by = $request['userName'];
        $output -> save() ;

        return response()->json($output);
    }

    
    /**
     * get all output device
     *
     * @param none
     */
    public function getDataOutput(Request $request)
    {
        $data = OutputDevice::where('id','>',0)->get();

        return response()->json($data);
    }

    /**
     * delete output device selected
     *
     * @param id
     */
    public function deleteOutput(Request $request)
    {
        $result = [
            'status' => 'error',
        ];

        $deviceId = $request -> id ;
        $data = OutputDevice::where('id', '=', $deviceId)-> delete() ;
        // info($data) ;
        
        return response()->json($result, 200);
    }
}
