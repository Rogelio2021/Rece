<?php

namespace App\Http\Controllers;

use App\Models\Empleado1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Empleado1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos1['empleados1']=Empleado1::paginate(20);
        return view('empleado1.index1',$datos1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado1.create1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos1=[
            'Nombre'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Estado'=>'required|string|max:100',
            'Municipio'=>'required|string|max:100',
            'Direccion'=>'required|string|max:10000',
            'Foto'=>'required|max:100000|mimes:jpeg,png,jpg',   
        ];
        $mensaje1=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];
            
        $this->validate($request,$campos1,$mensaje1);


        //$datosEmpleado1=request()->all();

        $datosEmpleado1=request()->except('_token');
      
        if($request->hasFile('Foto')){
            $datosEmpleado1['Foto']=$request->file('Foto')->store('upload1','public');
        }


        Empleado1::insert($datosEmpleado1);

       // return response()->json($datosEmpleado1);
       return redirect('empleado1')->with('mensaje','Envio Agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado1  $empleado1
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado1 $empleado1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado1  $empleado1
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado1=Empleado1::findOrFail($id);
        return view('empleado1.edit1',compact('empleado1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado1  $empleado1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos1=[
            'Nombre'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',
            'Estado'=>'required|string|max:100',
            'Municipio'=>'required|string|max:100',
            'Direccion'=>'required|string|max:10000',
          
        ];
        $mensaje1=[
            'required'=>'El :attribute es requerido',
            
        ];
        if($request->hasFile('Foto')){
            $campos1=['Foto'=>'required|max:100000|mimes:jpeg,png,jpg'];
            $mensaje1=['Foto.required'=>'La foto es requerida'];
        }
        $this->validate($request,$campos1,$mensaje1);


        //
        $datosEmpleado1=request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $empleado1=Empleado1::findOrFail($id);
            Storage::delete('public/'.$empleado1->Foto);
            $datosEmpleado1['Foto']=$request->file('Foto')->store('upload1','public');
        }
        
        Empleado1::where('id','=',$id)->update($datosEmpleado1);
        $empleado1=Empleado1::findOrFail($id);
        //return view('empleado1.edit1',compact('empleado1'));


        
         return redirect ('empleado1')->with('mensaje','Envio Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado1  $empleado1
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado1=Empleado1::findOrFail($id);
        if(Storage::delete('public/'.$empleado1->Foto)){
            Empleado1::destroy($id);
        }

       
        return redirect ('empleado1')->with('mensaje','Envio Borrado');
    }
}
