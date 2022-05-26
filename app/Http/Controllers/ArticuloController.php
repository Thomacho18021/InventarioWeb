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
    $articulo = new Articulos();
    $articulo->codigo = $request->get('codigo');
    $articulo->nombre = $request->get('nombre');
    $articulo->id_categoria = $request->get('id_categoria');
    $articulo->stock = $request->get('stock');
    $articulo->stock_critico = $request->get('stock_critico');
    $articulo->ubicacion = $request->get('ubicacion');
    $articulo->estado = 0;
    $articulo->save();

    return redirect('productos');
  }

  public function edit($id)
  {
    $producto = Articulos::findOrFail($id);
    $categorias = Categorias::all();

    return view('productos.edit', compact('producto','categorias'));
  }

  public function update(Request $request)
  {
    $id = $request->get('id_producto');

    $articulo = Articulos::findOrFail($id);
    $articulo->codigo = $request->get('codigo');
    $articulo->nombre = $request->get('nombre');
    $articulo->id_categoria = $request->get('id_categoria');
    $articulo->stock = $request->get('stock');
    $articulo->stock_critico = $request->get('stock_critico');
    $articulo->ubicacion = $request->get('ubicacion');
    $articulo->update();

    return redirect('productos');

  }

  public function destroy($id)
  {
    Articulos::findOrFail($id)->delete();

    return redirect('productos');
  }
}
