<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamientos;

class TratamientosController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamientos::all();
        return view('tratamientos.index', compact('tratamientos'));
    }

    public function create()
    {
        return view('tratamientos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tratamiento' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'costo' => 'required|numeric|min:0',
        ]);

        Tratamientos::create($request->all());

        return redirect()->route('tratamientos.index');
    }

    public function edit($id)
    {
        $tratamiento = Tratamientos::findOrFail($id);
        return view('tratamientos.edit', compact('tratamiento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tratamiento' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'costo' => 'required|numeric|min:0',
        ]);

        $tratamiento = Tratamientos::findOrFail($id);
        $tratamiento->update($request->all());

        return redirect()->route('tratamientos.index');
    }

    public function destroy($id)
    {
        $tratamiento = Tratamientos::findOrFail($id);
        $tratamiento->delete();

        return redirect()->route('tratamientos.index');
    }



}
