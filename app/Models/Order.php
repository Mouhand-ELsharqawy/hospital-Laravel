<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'patient_id', 'doctor_id', 'orderdate', 'deliverydate', 'address', 'phone', 'note', 'status', 'paymenttype', 'cardno', 'cvvno', 'card_holder', 'expiredate'];
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
