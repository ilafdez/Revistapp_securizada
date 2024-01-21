<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticuloController extends Controller
{
    public function guardar(Request $request)
    {
        $tags  = [Tag::find(1),Tag::find(2)];

        $articulo = new Articulo();
        $articulo->titulo = "titulo1";
        $articulo->contenido = "contenido1";
        $articulo->publicado=false;
        $articulo->save();

        $articulo->tags()->attach(1);
        //you can return json if it's an API,
        return response()->json(['success' => true, 'articulo' => $articulo]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$articulos = [
            ["id" => 1, "titulo" => "Primer artículo..."],
            ["id" => 2, "titulo" => "Segundo artículo..."],
            ["id" => 3, "titulo" => "Tercer artículo..."],
        ];*/
        $articulos = Articulo::all();
        return view('articulos.index', [
            'articulos' => $articulos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'titulo'=>'required|string|max:255',
            'contenido'=>'required|string|max:255'
        ]);
        $articulo = new Articulo;
        $articulo->titulo = $validated['titulo'];
        $articulo->contenido = $validated['contenido'];
        $articulo->publicado=false;
        $articulo->save();
        /*if ($validated->fails()) {
                return back()->withErrors($validated)->withInput($request->all());
            }*/
        return redirect(route("articulos.index"))->with('message', 'User created successfully.');
        //return redirect('articulos.index')->with('message', 'User created successfully.');
        /* }catch (\Exception $exception ){
             //Sesion-->return back()->with(['message' => 'Error en el formulario'])->withInput();
             return back()->withErrors(['message'=>'No se ha podido guardar, inténtelo más tarde'])->withInput($request->all());
         }*/

        // Otra alternativa para la inserción:
        /*$articulo = Articulo::create([
            'titulo' => request('titulo'),
            'contenido' => request('contenido')
        ]);*/

        return redirect(route('articulos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $articulo= Articulo::findOrFail($id);
        }catch(\Exception $exception){
            return back()->withErrors([$exception->getMessage()])->withInput();
        }
        return view('articulos.show', ['articulo' => $articulo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo)
    {
        try {

        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('articulos.edit', ['articulo'=>$articulo]);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
    {
        $validated = $request->validate([
            'titulo'=>'required|string|max:255',
            'contenido'=>'required|string'
        ]);
        $articulo->update($validated);
        return redirect(route('articulos.show', $articulo->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        try {

            $articulo->delete();
            //Articulo::destroy($articulo->id);
        }catch (\Exception $exception){
            return back()->withError( $exception->getMessage())->withInput();
        }
        return redirect()->back();

    }
}
