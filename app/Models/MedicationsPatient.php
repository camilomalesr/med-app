<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationsPatient extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'patient_id', 'medication_id',
        'current_amount'
    ];
    public function patient() {
        return $this->belongsTo(Patients::class, 'patient_id', 'id');
    }
    public function medicament() {
        return $this->belongsTo(Medications::class, 'medication_id', 'id');
    }
}
