<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar estudiante</title>
</head>
<body>

    <h1>Editar estudiante</h1>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Hay errores en el formulario:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"
               value="{{ old('nombre', $estudiante->nombre) }}" required>
        <br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo"
               value="{{ old('correo', $estudiante->correo) }}" required>
        <br><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad"
               value="{{ old('edad', $estudiante->edad) }}" required>
        <br><br>

        <label for="programa">Programa:</label>

        <select name="programa" id="programa" required>
            <option value="">Seleccione un programa</option>

            @foreach (config('programas.programas') as $programa)
                <option value="{{ $programa }}"
                    {{ old('programa', $estudiante->programa) == $programa ? 'selected' : '' }}>
                    {{ $programa }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Actualizar estudiante</button>
    </form>

    <br>

    <a href="{{ route('estudiantes.index') }}">Volver al listado</a>

</body>
</html>
