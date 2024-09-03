<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Tratamientos;
use Illuminate\Http\Request;
use App\Mail\CitaCreada;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Jobs\EnviarRecordatorioCita;



class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::with(['cliente', 'tratamiento'])->get();
        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
         $tratamientos = Tratamientos::all();
        return view('citas.create', compact('clientes', 'tratamientos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'costo' => 'required|numeric',
        ]);

        $cita = Cita::create([
            'cliente_id' => $request->cliente_id,
            'tratamiento_id' => $request->tratamiento_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'costo' => $request->costo,
        ]);
        $horaCita = Carbon::createFromFormat('Y-m-d H:i', $cita->fecha . ' ' . $cita->hora);
        $horaEnvio = $horaCita->subMinutes(2);

        EnviarRecordatorioCita::dispatch($cita)->delay($horaEnvio);


     /*    try {
            Mail::to('agitokanoh657@gmail.com')->send(new CitaCreada($cita));
        } catch (\Exception $e) {
            Log::error('Error al enviar correo: '.$e->getMessage());
        } */

        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cita = Cita::with(['cliente', 'tratamiento'])->findOrFail($id);
        return view('citas.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cita = Cita::findOrFail($id);
        $clientes = Cliente::all();
        $tratamientos = Tratamientos::all();
        return view('citas.edit', compact('cita', 'clientes', 'tratamientos'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $request->validate([
                'cliente_id' => 'required|exists:clientes,id',
                'tratamiento_id' => 'required|exists:tratamientos,id',
                'fecha' => 'required|date',
                'hora' => 'required|date_format:H:i',
                'costo' => 'required|numeric',
            ]);

            $cita = Cita::findOrFail($id);
            $cita->update($request->all());

            return redirect()->route('citas.index');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $cita = Cita::findOrFail($id);
            $cita->delete();

            return redirect()->route('citas.index');
        }

}
