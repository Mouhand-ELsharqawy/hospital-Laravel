<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctortiming extends Model
{
    use HasFactory;
    protected $fillable =[ 'id', 'doctor_id', 'start', 'end', 'avilable_day', 'status'];
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
