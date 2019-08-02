<?php

namespace App\Http\Controllers\Med_Date;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Medical_Date;

class Medical_DateController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citasmedicas = Medical_Date::all();

        return $this->showAll($citasmedicas);
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

            'date' => 'required',
            'time' => 'required',
            'status' => 'required',
            'observation' => 'required',
            'price' => 'required',
            'patient' => 'required',
        ];


        $this->validate($request, $reglas);


        $campos = $request->all();

        $citasmedicas = Medical_Date::create($campos);

        return $this->showOne($citasmedicas, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medical_Date $medicaldate)
    {
        return $this->showOne($medicaldate, 200);
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
    public function update(Request $request, Medical_Date $medicaldate)
    {
        $reglas = [

            'date' => 'required',
            'time' => 'required',
            'observation' => 'required'   
        ];

        $this->validate($request, $reglas);

        if ($request->has('date')) {
            $medicaldate->date = $request->date;
        }

        if ($request->has('time')) {
            $medicaldate->time = $request->time;
        }

        if ($request->has('observation')) {
            $medicaldate->observation = $request->observation;
        }


        if (!$medicaldate->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $medicaldate->save();

        return $this->showOne($medicaldate, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medical_Date $medicaldate)
    {
        $medicaldate->delete();

         return $this->showOne($medicaldate, 200);
    }
    
}

