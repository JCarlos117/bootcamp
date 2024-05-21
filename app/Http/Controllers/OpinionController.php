<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;

class OpinionController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ]);

        // Crear una nueva opinión utilizando asignación masiva
        Opinion::create($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', '¡Tu opinión ha sido enviada exitosamente!');
    }
}
