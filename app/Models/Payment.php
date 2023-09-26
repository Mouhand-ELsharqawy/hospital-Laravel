<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'patient_id', 'appointment_id', 'paiddate', 'paidtime', 'paidamount', 'status', 'cardholder', 'cardnumber', 'cvvno', 'exdate'];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function appoinment(){
        return $this->belongsTo(Appoinment::class);
    }
}
