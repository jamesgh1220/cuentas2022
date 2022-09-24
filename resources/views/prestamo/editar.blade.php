@extends('welcome')

@section('content')
    <div class="container text-center w-100">
        <div class="row">
        @include('includes.message')
            <div class="col">
                <div class="card text-white w-75 bg-info">
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
            <div class="col">
                <div class="card text-white bg-info">
                    <div class="card-header">
                        <h4>Tabla de informacion</h4>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-info text-white">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" aria-current="page" href="{{ route('prestamo.index') }}"><b>Prestamos</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('prestamo.index') }}"><b>Deudas</b></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prestamos as $prestamo)
                                    <tr class="text-white">
                                        <td><a class="text-black" href="{{ route('cuota.index', ['id' => $prestamo->id]) }}"><i class="fa-solid fa-circle-plus"></i></a></td>
                                        <td><a class="text-black" href="{{ route('prestamo.editar', ['id' => $prestamo->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                        <td><a class="text-black" href=""><i class="fa-solid fa-trash"></i></a></td>
                                        <td><?php echo $prestamo->tipo_prestamo == 0 ? 'Prestamo' : 'Deuda'; ?></td>
                                        <td>{{$prestamo->nombre}}</td>
                                        <td>{{$prestamo->descripcion}}</td>
                                        <td>$ <?php echo number_format($prestamo->valor, 0, '.', ','); ?></td>
                                        <td><?php echo substr($prestamo->created_at, 0, 10); ?></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection













