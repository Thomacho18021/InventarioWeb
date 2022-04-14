<?php

namespace App\Http\Controllers;

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
    return view('productos.index');
  }

  public function create()
  {
  }

  public function store(Request $request)
  {

  }

  public function edit($id)
  {

  }

  public function update(Request $request)
  {

  }

  public function destroy($id)
  {

  }

}
