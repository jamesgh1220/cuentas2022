<div class="col-8 mt-4">
    <div class="box-table card text-white">
        <div class="card-header">
            <h4>Tabla de informacion</h4>
        </div>
        @include('includes.menuPrestamo')
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
                            <td><a class="text-black" href="{{ route('cuota.index', ['id' => $prestamo->id]) }}"><i class="fa-sharp fa-solid fa-gear"></i></a></td>
                            <td><a class="text-black" href="{{ route('prestamo.editar', ['id' => $prestamo->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a></td>
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