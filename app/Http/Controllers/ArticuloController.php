<?php

namespace App\Http\Controllers;

use App\Articulos;
use App\Categorias;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $listado_productos = Articulos::all();

    return view('productos.index',compact('listado_productos'));
  }

  public function create()
  {
    $categorias = Categorias::all();

    return view('productos.create', compact('categorias'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'codigo' => 'required|unique:articulos|max:50',
      'nombre' => 'required|unique:articulos|max:191',
      'id_categoria' => 'required|integer',
      'stock' => 'required|integer',
      'stock_critico' => 'required|integer',
      'ubicacion' => 'max:191',
    ],[
      'codigo.required' => 'El campo código es requerido',
      'codigo.unique' => 'El código ingresado ya se encuentra registrada en la base de datos',
      'codigo.max' => 'El campo código no debe superar 50 caracteres',
      'nombre.required' => 'El campo nombre es requerido',
      'nombre.unique' => 'El nombre de producto ingresado ya se encuentra registrada en la base de datos',
      'nombre.max' => 'El campo nombre no debe superar 191 caracteres',
      'id_categoria.required' => 'El campo categoria es requerido',
      'id_categoria.integer' => 'El campo categoria debe ser entero',
      'stock.required' => 'El campo stock es requerido',
      'stock.integer' => 'El campo stock debe ser entero',
      'stock_critico.required' => 'El campo stock critico es requerido',
      'stock_critico.integer' => 'El campo stock critico debe ser entero',
      'ubicacion.max' => 'El campo ubicación no debe superar 191 caracteres',
    ]);

    $articulo = new Articulos();
    $articulo->codigo = $request->get('codigo');
    $articulo->nombre = $request->get('nombre');
    $articulo->id_categoria = $request->get('id_categoria');
    $articulo->stock = $request->get('stock');
    $articulo->stock_critico = $request->get('stock_critico');
    $articulo->ubicacion = $request->get('ubicacion');
    $articulo->estado = 0;
    $articulo->save();

    return redirect('productos')->with('msj','Producto agregada exitosamente');
  }

  public function edit($id)
  {
    $producto = Articulos::findOrFail($id);
    $categorias = Categorias::all();

    return view('productos.edit', compact('producto','categorias'));
  }

  public function update(Request $request)
  {
    $validatedData = $request->validate([
      'codigo' => 'required|max:50',
      'nombre' => 'required|max:191',
      'id_categoria' => 'required|integer',
      'stock' => 'required|integer',
      'stock_critico' => 'required|integer',
      'ubicacion' => 'max:191',
    ],[
      'codigo.required' => 'El campo código es requerido',
      'codigo.max' => 'El campo código no debe superar 50 caracteres',
      'nombre.required' => 'El campo nombre es requerido',
      'nombre.max' => 'El campo nombre no debe superar 191 caracteres',
      'id_categoria.required' => 'El campo categoria es requerido',
      'id_categoria.integer' => 'El campo categoria debe ser entero',
      'stock.required' => 'El campo stock es requerido',
      'stock.integer' => 'El campo stock debe ser entero',
      'stock_critico.required' => 'El campo stock critico es requerido',
      'stock_critico.integer' => 'El campo stock critico debe ser entero',
      'ubicacion.max' => 'El campo ubicación no debe superar 191 caracteres',
    ]);

    $id = $request->get('id_producto');

    $articulo = Articulos::findOrFail($id);
    $articulo->codigo = $request->get('codigo');
    $articulo->nombre = $request->get('nombre');
    $articulo->id_categoria = $request->get('id_categoria');
    $articulo->stock = $request->get('stock');
    $articulo->stock_critico = $request->get('stock_critico');
    $articulo->ubicacion = $request->get('ubicacion');
    $articulo->update();

    return redirect('productos')->with('msj','Producto actualizado exitosamente');
  }

  public function destroy($id)
  {
    Articulos::findOrFail($id)->delete();

    return redirect('productos')->with('msj','Producto eliminado exitosamente');
  }

}
