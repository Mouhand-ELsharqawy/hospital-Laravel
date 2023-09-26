<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'type', 'patient_id', 'room_id', 'department_id', 'appointmentdate', 'appointmenttime', 'doctor_id', 'status', 'app_reason'];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function billing(){
        return $this->hasMany(Billing::class);
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
    public function prescription(){
        return $this->hasMany(Prescription::class);
    }
    public function treatmentrecord(){
        return $this->belongsTo(Treatmentrecord::class);
    }
    
}
