<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDirectorioRequest;
use App\Http\Requests\UpdateDirectorioRequest;
use Illuminate\Http\Request;
use App\Directorio;


class DirectorioController extends Controller
{
    //GET listar registros
    public function index(Request $request)
    {
        if($request->has('txtbuscar')){
            $directorio = Directorio::where('nombre', 'like', '%' . $request->txtbuscar . '%')->
                                      orWhere('telefono','like', '%' . $request->txtbuscar . '%')->  
                                       get();

            return $directorio;
        }else
            $directorio = Directorio::all();
        return $directorio;
    }

    private function cargarArchivo($file)
    {
        $nombreArchivo = time() . '.' . $file->getClientOriginalExtension();
        $ruta = public_path();
        $file->move(public_path('fotografias'), $nombreArchivo);
        //return "http://" . $request->getHttpHost() . "/fotografias/" . $nombreArchivo;
        return request()->getSchemeAndHttpHost() . "/fotografias/" . $nombreArchivo;
    }

    //POST insertar datos
    public function store(CreateDirectorioRequest $request)
    {
        $input = $request->all();
         if($request->has('foto'))
            $input['foto'] = $this->cargarArchivo($request->foto,);
 
        Directorio::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro Creado con Exito'
        ], 200);                
    }

   //GET retorna un solo registro
    public function show(Directorio $directorio)
    {
        return $directorio;
    }

    //PUT actualizar registro
    public function update(UpdateDirectorioRequest $request, Directorio $directorio)
    {
        $input = $request->all();
        if($request->has('foto')){
            $input['foto'] = $this->cargarArchivo($request->foto);
           // dd($input['foto']);
        }

        $directorio->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado con exito'
        ], 200);

    }

   //DELETE eliminar registros
    public function destroy($id)
    {
        Directorio::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado con exito'
        ], 200);

    }
}
