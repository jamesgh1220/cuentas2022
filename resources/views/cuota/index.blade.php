@extends('welcome')

@section('content')
    <div class="container text-center w-100">
        <div class="row">
        @include('includes.message')
            <div class="col">
                <div class="card text-white bg-info">
                    <div class="card-header">
                        <h4>{{$prestamo->nombre}}</h4>
                    </div>
                    <div class="card-body">
                        <h5>Tipo: </h5>
                        <span><?php echo $prestamo->tipo_prestamo === 0 ? 'Prestamo' : 'Deuda'; ?></span>
                        <br><br>
                        <h5>Descripcion:</h5>
                        <span>{{$prestamo->descripcion}}</span>
                        <br><br>
                        <h5>Valor:</h5>
                        <span>$ <?php echo number_format($valor, 0, '.', ','); ?></span>
                        <br><br>
                        <h5>Valor actual:</h5>
                        <!-- desde el controlador hace una suma de cuotas con el id prestamo para restarla con el valor -->
                        <span>$ <?php echo number_format($valor, 0, '.', ','); ?></span>
                    </div>
                </div>
                <div class="card text-white bg-info mt-4">
                    <div class="card-header">
                        <h4>Agregar cuota</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('cuota.guardar')}}">
                            @csrf
                            <input type="hidden" value="$prestamo->id" name="prestamo_id">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre cuota</label>
                                <input type="text" id="nombre" name="nombre" class="form-control">
                            </div>
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
            <div class="col">
                que chimba de bozo
            </div>
        </div>
    </div>
@endsection













