<div class="col">
    <div class="card text-white w-75 bg-info">
        <div class="card-header">
            <h4>Crear</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('prestamo.guardar')}}">
                @csrf
                <div class="mb-3">
                <label for="tipo_prestamo" class="form-label">Tipo prestamo</label>
                <select class="form-select" onlyread="true" name="tipo_prestamo">
                    <option value="0" selected>Prestamo</option>
                    <option value="1">Deudas</option>
                </select>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre prestamo</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
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