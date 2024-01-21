<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Articulo $articulo)
    {
        $comentario = new Comentario;

        $comentario->texto = $request->texto;
        $articulo->comentarios()->save($comentario);

        /* Alternativa:
        $comentario->articulo_id = $articulo->id;
        $comentario->save();
        */

        return redirect()->route('articulos.show', $articulo->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
