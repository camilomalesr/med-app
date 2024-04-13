<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{MedicationsPatient, FlowMedications};

class MedicationsPatientController extends Controller
{
    public function store(Request $request)
    {
        $medicationPatient = MedicationsPatient::create([
            "patient_id" => $request->patient_id,
            "medication_id" => $request->medication_id,
            "current_amount" => $request->amount,
        ]);
        FlowMedications::create([
            "date" => $request->date,
            "amount" => $request->amount,
            "type" => $request->type,
            "medications_patients_id" => $medicationPatient->id
        ]);
        return redirect('patient/'.$request->patient_id.'/medications');
    }
    public function formAddFlow($id)
    {
        $medicationPatient = MedicationsPatient::find($id);
        return view('flow_medications.form', compact('medicationPatient'));
    }
    
}
