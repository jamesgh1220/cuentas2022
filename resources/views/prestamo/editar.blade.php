@extends('welcome')

@section('content')
    <div class="">
        <div class="row">
        @include('includes.message')
            <div class="col">
                <div class="box card text-white">
                    <div class="card-header">
                        <h4>Editar: {{$prestamo->nombre}}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('prestamo.actualizar')}}">
                            @csrf
                            <input type="hidden" name="prestamo_id" value="{{$prestamo->id}}">
                            <div class="mb-3">
                            <label for="tipo_prestamo" class="form-label">Tipo prestamo</label>
                            <select class="form-select" name="tipo_prestamo">
                                <option value="0" {{ ( $prestamo->tipo_prestamo == 0) ? 'selected' : '' }}>Prestamo</option>
                                <option value="1" {{ ( $prestamo->tipo_prestamo == 1) ? 'selected' : '' }}>Deuda</option>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre prestamo</label>
                                <input type="text" value="{{ $prestamo->nombre }}" id="nombre" name="nombre" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripcion</label>
                                <input type="text" value="{{ $prestamo->descripcion }}" id="descripcion" name="descripcion" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="valor" class="form-label">Valor</label>
                                <input type="number" value="{{ $prestamo->valor }}" id="valor" name="valor" class="form-control">
                            </div>
                            <button type="submit" class="btn bg-black text-white">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
            @include('includes.tablaPrestamo')
        </div>
    </div>
@endsection













