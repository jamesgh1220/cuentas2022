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
                        <span>$ <?php echo number_format($valor-$abonado, 0, '.', ','); ?></span>
                    </div>
                </div>
                <div class="card text-white bg-info mt-4">
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
            <div class="col">
            <div class="card text-white bg-info">
                    <div class="card-header">
                        <h4>Cuotas</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Prestamo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuotas as $cuota)
                                    <tr class="text-white">
                                        <td><a class="text-black" href="{{ route('cuota.editar', ['id' => $cuota->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                        <td><a class="text-black" data-bs-toggle="modal" data-bs-target="#myModal" href=""><i class="fa-solid fa-trash"></i></a></td>
                                        <td>{{$prestamo->nombre}}</td>
                                        <td>{{$cuota->descripcion}}</td>
                                        <td>$ <?php echo number_format($cuota->valor, 0, '.', ','); ?></td>
                                        <td><?php echo substr($cuota->created_at, 0, 10); ?></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal text-black" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">¿Eliminar cuota?</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            Si eliminas esta cuota, no podrás volver a recuperarla.
                            ¿Quieres eliminarla?
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <a href="" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection













