<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'status'];

    public function appointment(){
        return $this->hasMany(Appoinment::class);
    }
    public function doctor(){
        return $this->hasMany(Doctor::class);
    }
}
