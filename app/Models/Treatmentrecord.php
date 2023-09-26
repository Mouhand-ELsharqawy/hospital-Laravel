<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatmentrecord extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'treatment_id', 'appointment_id', 'patient_id', 'doctor_id', 'descrption', 'status', 'treaatmentdate', 'treaatmenttime'];
    public function treatment(){
        return $this->belongsTo(Treatment::class);
    }
    public function appointment(){
        return $this->belongsTo(Appoinment::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }


    public function prescription(){
        return $this->hasMany(Prescription::class);
    }
}
