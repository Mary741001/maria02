@extends ('pagPlantilla')

@section ('titulo')
    <h1 class=2display-4> Página actualizar </h1>
@endsection

@section ('seccion')
    <h3> Detalle estudiante</h3>
    
    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif
    
    
    <form action = "{{route('Estudiante.xRegistrar')}}" method="post" class="d-grid gap-2">
       
    @csrf

        @error('codEst')
            <div class="alert alert-danger">
                El código es requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                El nombre es requerido 
            </div>
        @enderror

        @if($errors -> has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El <strong>apellido</strong> es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <input type="text" name="codEst" placeholder="Código" value="{{$xActAlumnos->codEst}}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombres" value="{{$xActAlumnos->nomEst}}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{$xActAlumnos->apeEst}}" class="form-control mb-1">
        <input type="text" name="fnaEst" placeholder="Fecha de nacimiento" value="{{$xActAlumnos->fnaEst}}" class="form-control mb-1">
        <select name="turMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="1">Turno Día</option>
            <option value="2">Turno Noche</option>
            <option value="3">Turno Tarde</option>
        </select>
        <select name="semMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option value="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-1">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>

        <button class="btn btn-warning" type="submit"> ACTUALIZAR </button>

    </form>
    
@endsection
