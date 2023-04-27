<nav class="nav-prestamo navbar navbar-expand-lg text-white">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('prestamo.index') }}"><b>Todos</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('prestamo.prestamo') }}"><b>Prestamos</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('prestamo.deuda') }}"><b>Ahorros</b></a>
                </li>
            </ul>
        </div>
    </div>
</nav>