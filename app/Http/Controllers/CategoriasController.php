<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('categorias AS c')->select("c.idCategoria", "c.nombre", "c.descripcion")->get();

        
        

        return view ("categorias.index", compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:100',
           

        ]);

        DB::table('categorias')->insert([
            "nombre" => $request->input("nombre"),
            "descripcion" => $request->input("descripcion")
           
        ]);

        return redirect()->route("categoriasindex");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = DB::table('categorias')->where('idCategoria', $id)->first();

        return view("categorias.editarCategoria", compact('categorias'));
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
    public function update(Request $request, $id)
    {
        DB::table('categorias')->where('idCategoria', $id)->update([
            "nombre" => $request->input("nombre"),
            "descripcion" => $request->input("descripcion")
        ]);

        return redirect()->route("categoriasindex");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categorias')->where('idCategoria', $id)->delete();
        return redirect()->route("categoriasindex");
    }

    public function addCategorias(Request $request){

      
       $validator = Validator::make($request->all(), [
        'nombreCat' => 'required',
        'descripcionCat' => 'required'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->getMessageBag()->toArray()]);
    } else {
        DB::table('categorias')->insert([
            "nombre" => $_POST['nombreCat'],
            "descripcion" => $_POST['descripcionCat']
           
        ]);

        
    }

    
        //Tambien envia un json con las funciones de laravel
        //return response()->json(['error'=>$validator->errors()->all()]);

      
    }
}
