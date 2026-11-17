<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar eliminación</title>
</head>
<body>

    <h1>Confirmar eliminación</h1>

    <p>¿Estás seguro de que deseas eliminar este estudiante?</p>

    <h3>Información del estudiante</h3>

    <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
    <p><strong>Correo:</strong> {{ $estudiante->correo }}</p>
    <p><strong>Edad:</strong> {{ $estudiante->edad }}</p>
    <p><strong>Programa:</strong> {{ $estudiante->programa }}</p>

    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Sí, eliminar estudiante</button>
    </form>

    <br>

    <a href="{{ route('estudiantes.index') }}">Cancelar y volver al listado</a>

</body>
</html>
