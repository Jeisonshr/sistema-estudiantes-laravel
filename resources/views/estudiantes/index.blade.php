<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de estudiantes</title>
</head>
<body>

    <h1>Listado de estudiantes</h1>

    <!-- Cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

    <br>

    <!-- Mensajes de éxito -->
    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <!-- Registrar estudiante -->
    <a href="{{ route('estudiantes.create') }}">
        Registrar nuevo estudiante
    </a>

    <br><br>

    <!-- Buscar estudiantes -->
    <h2>Buscar estudiantes</h2>

    <form action="{{ route('estudiantes.index') }}" method="GET">

        <input
            type="text"
            name="buscar"
            placeholder="Buscar por nombre, correo o programa"
            value="{{ $busqueda ?? '' }}"
        >

        <button type="submit">Buscar</button>

        <a href="{{ route('estudiantes.index') }}">
            Limpiar búsqueda
        </a>

    </form>

    <br>

    <!-- Tabla de estudiantes -->
    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Edad</th>
                <th>Programa</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($estudiantes as $estudiante)

                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->correo }}</td>
                    <td>{{ $estudiante->edad }}</td>
                    <td>{{ $estudiante->programa }}</td>

                    <td>

                        <!-- Editar -->
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}">
                            Editar
                        </a>

                        <!-- Confirmar eliminación -->
                        <a href="{{ route('estudiantes.confirmar', $estudiante->id) }}">
                            Eliminar
                        </a>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6">
                        No se encontraron estudiantes registrados.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</body>
</html>
