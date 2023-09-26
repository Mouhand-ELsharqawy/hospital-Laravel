<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'patient_id', 'appointment_id', 'date', 'time', 'dicount', 'taxamount', 'discountreason', 'dischargedate', 'dischargetime'];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function appointment(){
        return $this->belongsTo(Appoinment::class);
    }
    public function billingrecord(){
        return $this->hasMany(Billingrecord::class);
    }
}
