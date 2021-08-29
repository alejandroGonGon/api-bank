<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

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
        $fields = $request->validate([
            'balanza' => 'required|string'
        ]);
        $cuenta = Cuenta::create([
            'balanza' => $fields['balanza']
        ]);

        $token = $cuenta->createToken('myapptoken')->plainTextToken;

        $response = [
            'cuenta' => $cuenta,
            'token' => $token
        ];

        return response($response, 200);
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

    public function depositar(Request $request, $id)
    {
        $Cuenta = Cuenta::find($id);
        $monto = $Cuenta->balanza;
        $cuentaDepositada = $request->balanza + $monto;
        $Cuenta->balanza = $cuentaDepositada;
        $Cuenta->save();
        $correo = new ContactanosMailable ('Se a realizado el deposito exitosamente, monto : '.$request->balanza.' cuenta : '.$Cuenta->balanza);
        Mail::to('alejandro.gonzalez@anima.edu.uy')->send($correo);
        return $Cuenta;
    }
    public function transferencia(Request $request)
    {
        //
         $monto = $request->monto;
         $Cuenta1 = Cuenta::find($request->origen);
         $Cuenta2 = Cuenta::find($request->destino);
         //
         $Cuenta1->balanza = $Cuenta1->balanza - $monto;
         $Cuenta2->balanza = $Cuenta1->balanza + $monto;
         //
        $Cuenta1->save();
        $Cuenta2->save(); 
        $correo = new ContactanosMailable ('Se a realizado la transferencia exitosamente, monto : '.$monto.' para la cuenta : '.$request->destino);
        Mail::to('alejandro.gonzalez@anima.edu.uy')->send($correo);
        return $Cuenta1;
    }
    public function retiro(Request $request)
    {
        //
         $monto = $request->monto;
         $Cuenta1 = Cuenta::find($request->origen);
         //
         $Cuenta1->balanza = $Cuenta1->balanza - $monto;
         //
        $Cuenta1->save();
        $correo = new ContactanosMailable ('Se a realizado el retiro exitosamente, monto : '.$monto.'  cuenta : '.$Cuenta1->balanza);
        Mail::to('alejandro.gonzalez@anima.edu.uy')->send($correo);
        return $Cuenta1;
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
