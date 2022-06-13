<?php

namespace App\Http\Controllers;

use App\Articulos;
use App\Categorias;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $listado_categorias = Categorias::all();

    return view('categorias.index', compact('listado_categorias'));
  }

  public function create()
  {
    return view('categorias.create');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'nombre' => 'required|unique:categorias|max:191',
    ],[
      'nombre.required' => 'El campo nombre es requerido',
      'nombre.unique' => 'La categoria ingresada ya se encuentra registrada en la base de datos',
      'nombre.max' => 'El campo nombre no debe superar 191 caracteres',
    ]);

    $categoria = new Categorias();
    $categoria->nombre = $request->get('nombre');
    $categoria->save();

    return redirect('categorias')->with('msj', 'Categoria agregada exitosamente');
  }

  public function edit($id)
  {
    $categoria = Categorias::findOrFail($id);

    return view('categorias.edit', compact('categoria'));
  }

  public function update(Request $request)
  {
    $validatedData = $request->validate([
      'nombre' => 'required|max:191',
    ],[
      'nombre.required' => 'El campo nombre es requerido',
      'nombre.max' => 'El campo nombre no debe superar 191 caracteres',
    ]);

    $id = $request->get('id_categoria');

    $categoria = Categorias::findOrFail($id);
    $categoria->nombre = $request->get('nombre');
    $categoria->update();

    return redirect('categorias')->with('msj', 'Categoria actualizada exitosamente');
  }

  public function destroy($id)
  {
    //consultar si existen productos con esta categoria
    $existProductos = Articulos::where('id_categoria', $id)->exists();
    if ($existProductos) {
      return redirect('categorias')->with('msjError', 'Existen productos relacionados a esta categoria');
    } else {
      Categorias::findOrFail($id)->delete();
      return redirect('categorias')->with('msj', 'Categoria eliminada exitosamente');
    }
  }

}
