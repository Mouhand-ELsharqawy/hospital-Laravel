<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'treatmentrecord_id', 'doctor_id', 'patient_id', 'order_id', 'appointment_id', 'deliverytype', 'status', 'prescriptiondate'];
    public function treatmentrecord(){
        return $this->belongsTo(Treatmentrecord::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function appointment(){
        return $this->belongsTo(Appoinment::class);
    }


    public function prescriptionrecord(){
        return $this->hasMany(Prescriptionrecord::class);
    }
}
