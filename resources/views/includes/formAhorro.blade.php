<div class="col-4">
    <div class="box card text-white">
        <div class="card-header">
            <h4>Crear ahorro</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('prestamo.guardar')}}">
                @csrf
                <div class="mb-3">
                    <input type="hidden" value="1" name="tipo_prestamo">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" id="valor" name="valor" class="form-control">
                </div>
                <button type="submit" class="btn bg-black text-white">Guardar</button>
            </form>
        </div>
    </div>
</div>