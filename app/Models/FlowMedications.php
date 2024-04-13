<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowMedications extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'date', 'amount',
        'type','medications_patients_id'
    ];
}
