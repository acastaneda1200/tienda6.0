<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;



class ProductosController extends Controller
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
        $productos = DB::table('productos AS p')->select("p.id as idProducto", "p.nombre", "p.descripcion", "p.cantidad", "p.estado", "u.nombre as vendedor")
        ->join("users AS u", "u.id", "=", "p.id_vendedor")->get();

        $estado = array(
            array("ID" => "1", "DESCRIPCION" => "Activo"),
            array("ID" => "0", "DESCRIPCION" => "Inactivo")
        );

        $categorias = DB::select("select idCategoria ,CONCAT(nombre, '-', descripcion) as cat_des from categorias");
        
        return view ("productos.index", compact("productos", "estado", "categorias"));
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
            'cantidad' => 'integer|min:0|max:10',

        ]);

        DB::table('productos')->insert([
            "nombre" => $request->input("nombre"),
            "descripcion" => $request->input("descripcion"),
            "cantidad" => $request->input("cantidad"),
            "estado" => 0,
            "id_vendedor" => $request->input("usuario"),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route("productosindex");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = DB::table('productos')->where('id', $id)->first();

        

         $estado = array(
            array("ID" => "1", "DESCRIPCION" => "Activo"),
            array("ID" => "0", "DESCRIPCION" => "Inactivo")
        );

       
        
      
      

       return view("productos.editarProducto", compact('producto', 'estado'));
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
       
        DB::table('productos')->where('id', $id)->update([
            "nombre" => $request->input("nombre"),
            "descripcion" => $request->input("descripcion"),
            "cantidad" => $request->input("cantidad"),
            "estado" => $request->input("estado"),
            "id_vendedor" => $request->input("usuario"),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route("productosindex");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('productos')->where('id', $id)->delete();
        return redirect()->route("productosindex");
    }

    public function updateEstado(){

         $idProducto = $_POST['idProducto'];

            DB::table('productos')->where('id', $idProducto)->update([
                "estado" => $_POST['estado']
            ]);

            return redirect()->route("productosindex");


    }
}
