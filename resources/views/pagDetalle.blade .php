@extends('pagPlantilla')

@section('titulo')
    <h1 class="display">Pagina de lista</h1>
@endsection

@section('seccion')
    <h3>Detalle estudiante</h3>

    <p>Id:                 {{ $xDetAlumnos->id }}</p>
    <p>Código:             {{ $xDetAlumnos->codEst }}</p>
    <p>Apellidos y nombres:{{ $xDetAlumnos->apeEst }}, {{ $xDetAlumnos->nomEst}}</p>
    <p>Fecha de nacimiento:{{ $xDetAlumnos->FnaEst }}</p>
    <p>Turno:              {{ $xDetAlumnos->turEst }}</p>
    <p>Semestre:           {{ $xDetAlumnos->sedmEst }}</p>
    <p>Estado de matrícula:{{ $xDetAlumnos->estEst}}</p>

@endsection




