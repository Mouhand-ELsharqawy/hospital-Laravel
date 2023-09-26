<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicetype extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'type', 'charge', 'description', 'status'];
    public function billingrecord(){
        return $this->hasMany(Billingrecord::class);
    }
}
