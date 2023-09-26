<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'admissiondate', 'admissiontime', 'address', 'mobile', 'city', 'pincode', 'bloodgroup', 'gender', 'dob', 'status'];
    public function appointment(){
        return $this->hasMany(Appoinment::class);
    }
    public function billing(){
        return $this->hasMany(Billing::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
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
