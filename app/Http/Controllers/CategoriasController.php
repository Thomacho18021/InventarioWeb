<?php

namespace App\Http\Controllers;

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

    return view('categorias.index',compact('listado_categorias'));
  }

  public function create()
  {
    return view('categorias.create');
  }

  public function store(Request $request)
  {
    $categoria = new Categorias();
    $categoria->nombre = $request->get('nombre');
    $categoria->save();

    return redirect('categorias');
  }

  public function edit($id)
  {
    $categoria = Categorias::findOrFail($id);

    return view('categorias.edit', compact('categoria'));
  }

  public function update(Request $request)
  {
    $id = $request->get('id_categoria');

    $categoria = Categorias::findOrFail($id);
    $categoria->nombre = $request->get('nombre');
    $categoria->update();

    return redirect('categorias');
  }

  public function destroy($id)
  {
    Categorias::findOrFail($id)->delete();

    return redirect('categorias');
  }

}
