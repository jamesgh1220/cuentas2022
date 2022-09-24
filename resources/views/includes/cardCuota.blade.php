<div class="box card text-white">
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