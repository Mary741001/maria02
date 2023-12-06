@extends ('pagPlantilla')

@section ('titulo')
    <h1 class=2display-4> Página de lista </h1>
@endsection

@section ('seccion')
    <h3> Detalle curso</h3>
    
    <p> Id:                                {{ $xDetCursos->id}} </p>
    <p> Denominación de curso:             {{ $xDetCursos->denCur}} </p>
    <p> Horas:                             {{ $xDetCursos->hrsCur}} </p>
    <p> Créditos:                          {{ $xDetCursos->creCur}} </p>
    <p> Plan de estudio:                   {{ $xDetCursos->plaCur}} </p>
    <p> Tipo de curso:                     {{ $xDetCursos->tipCur}} </p>
    <p> Estado de curso:                   {{ $xDetCursos->estCur}} </p>
@endsection
