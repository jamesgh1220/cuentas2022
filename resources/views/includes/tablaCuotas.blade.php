<div class="col-8 mt-4">
    <div class="box-table card text-white">
        <div class="card-header">
            <h4>Cuotas</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr class="text-white">
                        <th scope="col"></th>
                        <th scope="col"></th>
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