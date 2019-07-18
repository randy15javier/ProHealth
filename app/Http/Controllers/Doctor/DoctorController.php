<?php

namespace App\Http\Controllers\doctor;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DoctorController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores = Doctor::all();
        return $this->showAll($doctores);
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
        $reglas = [

            'doctor_code' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'telephone' => 'required|unique:doctors',
            'email' => 'required|email|unique:doctors'   
        ];


        $this->validate($request, $reglas);


        $campos = $request->all();

        $doctor = Doctor::create($campos);

        return $this->showOne($doctor, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return $this->showOne($doctor, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {

        $reglas = [

            'telephone' => 'unique:doctors',
            'email' => '|email|unique:doctors,email,' . $doctor->id,   
        ];

        $this->validate($request, $reglas);

        if ($request->has('telephone')) {
            $doctor->telephone = $request->telephone;
        }

        if ($request->has('email')) {
            $doctor->email = $request->email;
        }


        if (!$doctor->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $doctor->save();

        return $this->showOne($doctor, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Doctor $doctor)
    {

        $doctor->delete();

         return $this->showOne($doctor, 200);

    }
}
