<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;


class PagesController extends Controller
{
    //////////////////// Portada //////////////////////////////////
    public function fnIndex(){
        return view('welcome');
    }

    //////////////////// CREATE ///////////////////////////////////
    public function fnRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
        ]);

        $nuevoEstudiante = new Estudiante;
        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->finaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->setMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;
        
        $nuevoEstudiante->save();
        
        //$xAlumnos = Estudiante::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    //////////////////// READ /////////////////////////////////////
    public function fnLista(){

        $xAlumnos = Estudiante::all();              //Todos los datos
        //$xAlumnos = Estudiante::paginate(4);
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnEstDetalle($id){

        $xDetAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    //////////////////// UPDATE ///////////////////////////////////
    public function fnEstActualizar($id){                   //Paso 1

        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){        //Paso 2

        //return $request->all();         //Prueba de "token" y datos recibidos

        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->finaEst = $request->fnaEst;
        $xUpdateAlumnos->turMat = $request->turMat;
        $xUpdateAlumnos->setMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;
        
        $xUpdateAlumnos->save();
        
        //$xAlumnos = Estudiante::all();                        //Datos de BD
        //return view('pagLista', compact('xAlumnos'));          //Pasar a pagLista
        return back()->with('msj','Se actualizó con éxito...');  //Regresar con msj
    }

    //////////////////// DELETE /////////////////////////////////// 
    public function fnEliminar(Request $request, $id){
        $deleteAlumno = Estudiante::findOrFaill($id);       //Datos de BD por Id
        $deleteAlumno->delete();
        return back()->with('msj', 'Se elimino con éxito...');
    }

    public function pagLista(){
        //$xAlumnos = Estudiante::all();        //Datos de BD
        $xAlumnos = Estudiante::paginate(4);     //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }

    //////////////////// EJEMPLO. RUTA CON VALIDACIÓN /////////////
    public function fnGaleria($numero=0){
        $valor = $numero;
        $otro  = 25;
        return view('pagGaleria', compact('valor','otro'));
    }
}
