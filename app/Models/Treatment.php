<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'treatment_type', 'cost', 'notic', 'status'];
    public function treatmentrecord(){
        return $this->belongsTo(Treatmentrecord::class);
    }
}
