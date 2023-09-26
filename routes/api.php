<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BillingrecordController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctortimingController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PrescriptionrecordController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServicetypeController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\TreatmentrecordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/posts',[PostController::class,'index']);
// Route::get('/posts/{id}',[PostController::class,'show']);
// Route::Post('/posts/store',[PostController::class,'store']);



Route::controller(AppointmentController::class)->group(function(){
    Route::get('appointment','index');
    Route::get('appointment/{id}','show');
    Route::post('appointment','store');
    Route::post('appointment/{id}','update');
    Route::delete('appointment/{id}','destroy');
});

Route::controller(BillingController::class)->group(function(){
    Route::get('billing','index');
    Route::get('billing/{id}','show');
    Route::post('billing','store');
    Route::post('billing/{id}','update');
    Route::delete('billing/{id}','destroy');
});
Route::controller(BillingrecordController::class)->group(function(){
    Route::get('billrecord','index');
    Route::get('billrecord/{id}','show');
    Route::post('billrecord','store');
    Route::post('billrecord/{id}','update');
    Route::delete('billrecord/{id}','destroy');
});
Route::controller(DepartmentController::class)->group(function(){
    Route::get('department','index');
    Route::get('department/{id}','show');
    Route::post('department','store');
    Route::post('department/{id}','update');
    Route::delete('department/{id}','destroy');
});

Route::controller(DoctorController::class)->group(function(){
    Route::get('doctor','index');
    Route::get('doctor/{id}','show');
    Route::post('doctor','store');
    Route::post('doctor/{id}','update');
    Route::delete('doctor/{id}','destroy');
});
Route::controller(DoctortimingController::class)->group(function(){
    Route::get('doctortiming','index');
    Route::get('doctortiming/{id}','show');
    Route::post('doctortiming','store');
    Route::post('doctortiming/{id}','update');
    Route::delete('doctortiming/{id}','destroy');
});

Route::controller(MedicineController::class)->group(function(){
    Route::get('medicine','index');
    Route::get('medicine/{id}','show');
    Route::post('medicine','store');
    Route::post('medicine/{id}','update');
    Route::delete('medicine/{id}','destroy');
});
Route::controller(OrderController::class)->group(function(){
    Route::get('order','index');
    Route::get('order/{id}','show');
    Route::post('order','store');
    Route::post('order/{id}','update');
    Route::delete('order/{id}','destroy');
});


Route::controller(PatientController::class)->group(function(){
    Route::get('patient','index');
    Route::get('patient/{id}','show');
    Route::post('patient','store');
    Route::post('patient/{id}','update');
    Route::delete('patient/{id}','destroy');
});

Route::controller(PaymentController::class)->group(function(){
    Route::get('payment','index');
    Route::get('payment/{id}','show');
    Route::post('payment','store');
    Route::post('payment/{id}','update');
    Route::delete('payment/{id}','destroy');
});

Route::controller(PrescriptionController::class)->group(function(){
    Route::get('prescription','index');
    Route::get('prescription/{id}','show');
    Route::post('prescription','store');
    Route::post('prescription/{id}','update');
    Route::delete('prescription/{id}','destroy');
});

Route::controller(PrescriptionrecordController::class)->group(function(){
    Route::get('prescriptionrecord','index');
    Route::get('prescriptionrecord/{id}','show');
    Route::post('prescriptionrecord','store');
    Route::post('prescriptionrecord/{id}','update');
    Route::delete('prescriptionrecord/{id}','destroy');
});

Route::controller(RoomController::class)->group(function(){
    Route::get('room','index');
    Route::get('room/{id}','show');
    Route::post('room','store');
    Route::post('room/{id}','update');
    Route::delete('room/{id}','destroy');
});

Route::controller(ServicetypeController::class)->group(function(){
    Route::get('service','index');
    Route::get('service/{id}','show');
    Route::post('service','store');
    Route::post('service/{id}','update');
    Route::delete('service/{id}','destroy');
});

Route::controller(TreatmentController::class)->group(function(){
    Route::get('treatment','index');
    Route::get('treatment/{id}','show');
    Route::post('treatment','store');
    Route::post('treatment/{id}','update');
    Route::delete('treatment/{id}','destroy');
});


Route::controller(TreatmentrecordController::class)->group(function(){
    Route::get('treatmentrecord','index');
    Route::get('treatmentrecord/{id}','show');
    Route::post('treatmentrecord','store');
    Route::post('treatmentrecord/{id}','update');
    Route::delete('treatmentrecord/{id}','destroy');
});