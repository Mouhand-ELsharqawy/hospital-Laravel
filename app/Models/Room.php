<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'type', 'number', 'noofbeds', 'room_tariff', 'status'];

    public function appointment(){
        return $this->hasOne(Appoinment::class);
    }
}
