@extends ('pagPlantilla')

@section ('titulo')
    <h1 class=2display-4> Página actualizar </h1>
@endsection

@section ('seccion')
    <h3> Detalle curso</h3>
    
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif
    
    <div class="btn btn-success d-grid fs-5 mb-2">Registrar nuevo seguimiento...</div>
    
    <form action = "{{route('xRegistrarCurso')}}" method="post" class="d-grid gap-2">
        
        
        @csrf

        @error('denCur')
            <div class="alert alert-danger">
                 La denominación es requerido
            </div>
        @enderror

        @error('hrsCur')
            <div class="alert alert-danger">
                Las horas es requerido 
            </div>
        @enderror

        @if(false)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Los <strong>créditos</strong> es requerido  
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <input type="text" name="denCur" placeholder="Denominación de curso" value="{{$xActCursos->denCur}}" class="form-control mb-2">
        <input type="text" name="hrsCur" placeholder="Horas" value="{{$xActCursos->hrsCur}}" class="form-control mb-2">
        <input type="text" name="creCur" placeholder="Créditos" value="{{$xActCursos->creCur}}" class="form-control mb-1">
        <input type="text" name="plaCur" placeholder="Plan de estudios" value="{{$xActCursos->plaCur}}" class="form-control mb-1">
        <select name="tipCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="Transversal">Transversal</option>
            <option value="Especialidad">Especialidad</option>
        </select>
        <select name="estCur" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>

        <button class="btn btn-info" type="submit"> ACTUALIZAR</button>

    </form>
    
@endsection
