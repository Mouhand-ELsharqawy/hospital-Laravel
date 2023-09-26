<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescriptionrecord extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'prescription_id', 'medicine_id', 'cost', 'unit', 'dosage', 'status'];
    public function prescription(){
        return $this->belongsTo(Prescription::class);
    }
    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}
