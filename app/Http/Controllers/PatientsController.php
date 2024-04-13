<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Patients, Medications, MedicationsPatient};

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patients = Patients::where('status', 'A')
                ->when($request->search, function ($q)  use ($request){
                    return $q->where(function($q) use ($request) {
                        $q->where('identification', 'like', '%'.$request->search.'%')
                        ->orWhere('name', 'like', '%'.$request->search.'%')
                        ->orWhere('lastname', 'like', '%'.$request->search.'%')
                        ;
                    });
                })
                ->get();
        return view('patients.index', compact('patients'));
    }

    public function form(Request $request)
    {
        
        return view('patients.form');
    }

    public function medications($id)
    {
        $patient = Patients::find($id);
        $medications = MedicationsPatient::with(['patient', 'medicament'])->where('patient_id', $id)->get();
        // return $medications;
        return view('patients.medications', compact('patient', 'medications'));
    }
    
    public function formAddMedication($id)
    {
        $patient = Patients::find($id);
        $medications = Medications::all();
        return view('patients.form-medication', compact('patient','medications'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $sendgrid = Patients::create([
            'name' => $request->name,
            'lastname' =>  $request->lastname,
            'identification' => $request->identification,            
        ]);
        
        return redirect('patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\model\Sendgrid  $sendgrid
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Patients::find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\model\Sendgrid  $sendgrid
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patients::find($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $patient = Patients::find($request->id);
        if($patient){
            $patient->name = $request->name;
            $patient->lastname = $request->lastname;
            $patient->identification = $request->identification;
            $patient->save();
            return redirect('patients');
        }
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $patient = Patients::find($request->id);
        if($patient){
            $patient->status = 'I';            
            $patient->save();
            return redirect('patients');
        }
        return abort(404);
    }
}
