<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'mobile', 'department_id', 'user_id', 'status', 'education', 'experince_years', 'consultancy_charge'];
    public function appointment(){
        return $this->hasMany(Appoinment::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function prescription(){
        return $this->hasMany(Prescription::class);
    }
    public function treatmentrecord(){
        return $this->belongsTo(Treatmentrecord::class);
    }
}
