<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cuenta::all();
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
        $request->validate([
            'balanza' => 'required']);

        return Cuenta::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuenta  $Cuenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cuenta::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuenta  $Cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $Cuenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuenta  $Cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Cuenta = Cuenta::find($id);
        $Cuenta->update($request->all());
        return $Cuenta;
    }

    public function depositar($id, $deposito)
    {
        $Cuenta = Cuenta::find($id);
        $monto = $Cuenta->balanza;
        $cuentaDepositada = $deposito + $monto;
        $Cuenta->balanza = $cuentaDepositada;

        $Cuenta->save();
       // $Cuenta->update($Cuenta->balanza = $cuentaDepositada);
        return $Cuenta;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuenta  $Cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Cuenta::destroy($id);
    }
}
