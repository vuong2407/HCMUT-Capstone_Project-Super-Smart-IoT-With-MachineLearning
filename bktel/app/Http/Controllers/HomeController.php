<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Farm;
use App\Models\InputDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Dnsimmons\OpenWeather\OpenWeather;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = InputDevice::where('id','>',0)->get();
        return view('admin.admin', compact('data'));
    }

    public function dashboard()
    {
        $data = InputDevice::where('id','>',0)->get();
        return view('admin.admin', compact('data'));
    }
    /**
     * Show the application history.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function history()
    {
        return view('admin.history');
    }

    /**
    * Show the application history.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function control()
    {
        // $weather = new OpenWeather();
        // $current = $weather->getCurrentWeatherByCityId('1566083');
        // dd($current);
        $user = Auth::user();
        return view('admin.control', compact('user'));
    }
    public function registerFarm()
    {
        $user = Auth::user();
        return view('farm.register', compact('user'));
    }

    public function saveFarmData(Request $request ){
        // $request->validate([
        //     'name' => 'required' ,
        //     'parameter' => 'required' ,
        //     'userName' => 'required'
        // ]);
        // $output = new OutputDevice();
        // $output -> name = $request['name'];
        // $output -> parameter = $request['parameter'];
        // $output -> added_by = $request['userName'];
        // $output -> save() ;

        // return response()->json($output);
        $request->validate([
            'name' => 'required' ,
            'location' => 'required' ,
        ]);
        $farm = new Farm() ;
        $farm -> name = $request['name'];
        $farm -> location = $request['location'];
        $farm -> save() ;
        return response()->json($farm);
    }

    public  function getAllFarm(Request $request)
    {
        $data = Farm::where('id','>',0)->get();

        return response()->json($data);
    }

    public function registerUser()
    {
        // $user = Auth::user();
        return view('admin.register-user');
    }

    //show form register information to recieve mail
    public function  registerMail(){
        $farm = Farm::where('id','>', 0)->get();
        return view('emails.form-register',compact('farm'));
    }

    /**
    * Send mail
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function testMail(Request $request)
    {
        $email = $request['email'];
        $name =  $request['name'];
        // info($email);
        // $name = 'test name' ;
        Mail::send('emails.test', compact('name'), function($email){
            $email->to('nha.le141001@hcmut.edu.vn', 'Lê Thanh Nhã')->subject('Mail from BKfarm');
        }) ;
    }

    public function saveMail(Request $request){
        $email = new Email() ;
        $email -> name = $request['name'];
        $email -> email = $request['email'];
        $email -> farm_id = $request['farm_id'];
        $email -> save() ;
        return response()->json($email);
    }

    public function getallMail(Request $request){
        $email = Email::where('id','>',0)->get();
        return response()->json($email);
    }


    public function weather()
    {
        $weather = new OpenWeather();
        $current = $weather->getCurrentWeatherByCityId('1566083');
        // dd($current);
        $forecast = $weather->getForecastWeatherByCityId('1566083');
        // dd($forecast);
        return view('admin.weather', compact('current'));
    }
}
