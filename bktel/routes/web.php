<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SendMessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('accountPermission')->name('home');
Route::get('/send', [SendMessageController::class , 'index'])->name('send');
Route::get('/showMessage', [SendMessageController::class , 'showMessage'])->name('showMessage');
Route::post('/postMessage', [SendMessageController::class , 'sendMessage'])->name('postMessage');
Route::get('/history', [HomeController::class, 'history'])->name('admin.history');
Route::get('/control', [HomeController::class, 'control'])->name('admin.control');
Route::get('/add-input-device', [DeviceController::class, 'showAddInput'])->name('showAddInput');
Route::post('/add-input-device', [DeviceController::class, 'addInput'])->name('addInput');
Route::get('/get-input-device', [DeviceController::class, 'getDataInput'])->name('getDataInput');
Route::post('/delete-input-device', [DeviceController::class, 'deleteInput'])->name('deleteInput');

Route::get('/add-output-device', [DeviceController::class, 'showAddOutput'])->name('showAddOutput');
Route::post('/add-output-device', [DeviceController::class, 'addOutput'])->name('addOutput');
Route::get('/get-output-device', [DeviceController::class, 'getDataOutput'])->name('getDataOutput');
Route::post('/delete-output-device', [DeviceController::class, 'deleteOutput'])->name('deleteOutput');

//save data auto
Route::post('/save-data-lm35', [DataController::class, 'saveDataLm35'])->name('saveDataLm35');

//farm
Route::get('/register-farm', [HomeController::class, 'registerFarm'])->name('registerFarm');
Route::post('/register-farm', [HomeController::class, 'saveFarmData'])->name('saveFarmData');
Route::get('/get-all-farm', [HomeController::class, 'getAllFarm'])->name('getAllFarm');



//admin
Route::get('/register-user', [HomeController::class, 'registerUser'])->name('registerUser');

//send mail

Route::post('/register-receive-mail', [HomeController::class, 'saveMail'])->name('saveMail');
Route::get('/get-all-mails', [HomeController::class, 'getallMail'])->name('getallMail');
Route::post('/test-email', [HomeController::class, 'testMail'])->name('testMail');
Route::get('/register-receive-mail', [HomeController::class, 'registerMail']);

//weather
Route::get('/weather', [HomeController::class, 'weather'])->name('weather');
Route::get('/fetch-data', [HomeController::class, 'fetchData'])->name('fetchData');

Route::get('/plant-diseases', [HomeController::class, 'plantDiseases'])->name('plantDiseases');
Route::post('/api/plant-diseases', [HomeController::class, 'predictDisease'])->name('predictDisease');
Route::get('/chat-GPT', [HomeController::class, 'chatGPT'])->name('chatGPT');
Route::post('/send-message-gpt', [HomeController::class, 'sendMessageToGPT'])->name('sendMessageToGPT');
Route::post('/check-water-pump', [HomeController::class, 'checkWaterPump'])->name('checkWaterPump');
