<?php

namespace App\Http\Controllers;

use App\Articulos;
use App\Inventarios;
use App\InventariosDetalle;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;

class SalidaInventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $list_inventarios = Inventarios::where('tipo_movimiento',2)->get();

        return view('salida_inventarios.index',compact('list_inventarios'));
    }

    public function create()
    {
        $articulos = Articulos::where('estado', 0)->get();

        return view('salida_inventarios.create', compact('articulos'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
                'descripcion' => 'required',
            ], [
                'descripcion.required' => 'El campo descripción es requerido',
            ]);

            $inventario = new Inventarios;
            $inventario->descripcion = $request->get('descripcion');
            $inventario->tipo_movimiento = 2;
            $inventario->fecha = date('Y-m-d');
            $inventario->estado = 0;
            $inventario->save();

            $array_articulos_ventas = $request->get('fila_articulo');
            $articulo = $request->get('articulo');
            $cantidad = $request->get('cantidad');

            if ($array_articulos_ventas){
                foreach ($array_articulos_ventas as $key){

                    $id_producto = $articulo[$key];
                    $cantidad_entrada = $cantidad[$key];

                    $get_articulo = Articulos::where('id', $id_producto)->first();

                    if($get_articulo != null and $get_articulo != ""){

                        $stock_actual = isset($get_articulo->stock)?$get_articulo->stock:0;

                        $detalle = new InventariosDetalle();
                        $detalle->id_inventario = $inventario->id;
                        $detalle->id_producto = $id_producto;
                        $detalle->cantidad = $cantidad_entrada;
                        $detalle->save();

                        $stock_actualizado = $stock_actual - $cantidad_entrada;

                        $articulo1 = Articulos::findOrFail($id_producto);
                        $articulo1->stock = $stock_actualizado;
                        $articulo1->update();
                    }
                }
            }

            DB::commit();

            return redirect('salidainventario')->with('msj','Salida de inventario registrado exitosamente');

        } catch (Exception $e) {
            DB::rollback();

            return redirect('salidainventario')->with('msjError','Error al registrar los datos');
        }
    }

    public function show ($id)
    {
        $detalles = InventariosDetalle::join('articulos as a','inventarios_detalle.id_producto','a.id')
        ->select('a.nombre as articulo', 'inventarios_detalle.cantidad')
        ->where('inventarios_detalle.id_inventario', $id)->get();

        $salida = Inventarios::findOrFail($id);

        return view('salida_inventarios.show', compact('salida','detalles'));
    }

    public function eliminar($id)
    {
        try {
            DB::beginTransaction();

            $entrada = Inventarios::findOrFail($id);

            $productos_inventario = InventariosDetalle::where('id_inventario', $id)->get();

            if ($productos_inventario){
                foreach ($productos_inventario as $key){
                    $id_articulo = $key->id_producto;
                    $cantidad = $key->cantidad;
                    $id_detalle_inventario = $key->id;

                    $get_articulo = Articulos::where('id', $id_articulo)->first();

                    if($get_articulo != null and $get_articulo != ""){

                        $stock_actual = isset($get_articulo->stock)?$get_articulo->stock:0;

                        $stock_actualizado = $stock_actual + $cantidad;

                        $articulo1 = Articulos::findOrFail($id_articulo);
                        $articulo1->stock = $stock_actualizado;
                        $articulo1->update();
                    }

                    $detalle = InventariosDetalle::findOrFail($id_detalle_inventario);
                    $detalle->delete();
                }
            }

            if ($entrada->delete()){
                DB::commit();
                return redirect('salidainventario')->with('msj','Salida de inventario eliminada exitosamente');
            }else{
                DB::rollback();
                return redirect('salidainventario')->with('msjError','Error al eliminar los datos');
            }
        } catch (Exception $e) {
            DB::rollback();
            return redirect('salidainventario')->with('msjError','Error al eliminar los datos');
        }
    }

}
