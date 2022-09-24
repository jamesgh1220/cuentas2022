@extends('welcome')

@section('content')
    <div class="row">
        @include('includes.message')
        <div class="col-4">
            @include('includes.cardCuota')
            <div class="box-inverse card text-white mt-4">
                <div class="card-header">
                    <h4>Agregar cuota</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('cuota.guardar')}}">
                        @csrf
                        <input type="hidden" value="{{$prestamo->id}}" name="prestamo_id">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion cuota</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor</label>
                            <input type="number" id="valor" name="valor" class="form-control">
                        </div>
                        <button type="submit" class="btn bg-black text-white">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
        @include('includes.tablaCuotas')
        @include('includes.modalCuota')
    </div>
@endsection













