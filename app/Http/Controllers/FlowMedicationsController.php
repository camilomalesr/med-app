<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{MedicationsPatient, FlowMedications};

class FlowMedicationsController extends Controller
{
    public function store(Request $request)
    {
        FlowMedications::create([
            "date" => $request->date,
            "amount" => $request->amount,
            "type" => $request->type,
            "medications_patients_id" => $request->medications_patients_id
        ]);
        $medicationPatient = MedicationsPatient::find($request->medications_patients_id);
        if($medicationPatient){
            if($request->type == 'Add'){
                $medicationPatient->current_amount = intval($medicationPatient->current_amount) + intval($request->amount);
            }else{
                $medicationPatient->current_amount = intval($medicationPatient->current_amount) - intval($request->amount);
            }
            $medicationPatient->save();
        }
        return redirect('patient/'.$medicationPatient->patient_id.'/medications');
    }
    public function history($id)
    {
        $history = FlowMedications::where("medications_patients_id", $id)->get();
        $medicationsPatient = MedicationsPatient::with(['patient', 'medicament'])->where('id', $id)->first();
        return view('flow_medications.index', compact('history','medicationsPatient'));
    }
}
