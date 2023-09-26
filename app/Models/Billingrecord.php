<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billingrecord extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'billing_id', 'servicetype_id', 'amount', 'billdate', 'status'];
    public function billing(){
        return $this->belongsTo(Billing::class);
    }
    public function servicetype(){
        return $this->belongsTo(Servicetype::class);
    }
}
