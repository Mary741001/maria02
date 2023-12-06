@extends ('pagPlantilla')

@section ('titulo')
    <h1 class="display-4">Página de lista Curso </h1>
@endsection

@section ('seccion')

    @if(session('msj'))
        <div class="alert alert-success">
            {{ session('msj') }}
        </div>
    @endif
    
    <div class="btn btn-success d-grid fs-5 mb-2">Registrar nuevo curso...</div>
    
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
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Los <strong>créditos</strong> es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @error('plaCur')
            <div class="alert alert-danger">
                Plan de estudios es requerido 
            </div>
        @enderror

        @error('tipCur')
            <div class="alert alert-danger">
                Tipo de curso es requerido 
            </div>
        @enderror

        @error('estCur')
            <div class="alert alert-danger">
                Estado de curso es requerido 
            </div>
        @enderror

        <input type="text" name="denCur" placeholder="Denominación de curso" value="{{old('denCur')}}" class="form-control mb-2">
        <input type="text" name="hrsCur" placeholder="Horas" value="{{old('hrsCur')}}" class="form-control mb-2">
        <input type="text" name="creCur" placeholder="Créditos" value="{{ old('creCur')}}" class="form-control mb-1">
        <input type="text" name="plaCur" placeholder="Plan de estudios" value="{{ old('plaCur')}}" class="form-control mb-1">
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

        <button class="btn btn-info" type="submit"> AGREGAR</button>

    </form>

    <h3>Lista</h3> 
   
    <div class="btn btn-dark d-grid fs-5 mb-2 bt-2">Lista de seguimiento...</div>

    <table class="table">
        <thead class="table-danger">
            <tr>
                <th $cope="col">Id</th>
                <th $cope="col">Denominación de curso</th>
                <th $cope="col">Tipo de estudios</th>
                <th $cope="col">Editar</th>
            </tr>
        </thead>
    <tbody>
    @foreach($xCursos as $item)
        <tr>
        <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->denCur }}</td>
                <td>
                    <a href="{{ route('xDetalleCurso', $item->id) }}">
                        {{ $item->tipCur }}
                    </a>
            </td>
            <td>
            
                <form action="{{ route('xEliminarCurso', $item->id) }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                         x
                    </button>
                </form>
                    ---
                <a class="btn btn-warning btn-sm" href="{{ route('xActualizarCurso', $item->id) }}">
                
                A
                </a>

            </td>
        </tr>

     

    @endforeach    

    </tbody>
    </table>

{{$xCursos->links()}}

@endsection
