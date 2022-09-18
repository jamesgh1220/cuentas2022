@extends('welcome')






@section('content')
    <div class="container text-center w-100">
        <div class="row">
        @include('includes.message')
        @include('includes.form')
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
                                        <a class="nav-link text-white" aria-current="page" href="{{ route('prestamo.prestamo') }}"><b>Prestamos</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('prestamo.deuda') }}"><b>Deudas</b></a>
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
                                        <td><a class="text-black" href=""><i class="fa-solid fa-circle-plus"></i></a></td>
                                        <td><a class="text-black" href=""><i class="fa-regular fa-pen-to-square"></i></a></td>
                                        <td><a class="text-black" href=""><i class="fa-solid fa-trash"></i></a></td>
                                        <td><?php echo $prestamo->tipo_prestamo === 0 ? 'Prestamo' : 'Deuda'; ?></td>
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













