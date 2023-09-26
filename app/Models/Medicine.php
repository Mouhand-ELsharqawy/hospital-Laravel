<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'cost', 'description', 'status'];
    public function prescriptionrecord(){
        return $this->hasMany(Prescriptionrecord::class);
    }
}
