<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>

    <h1>Iniciar sesión</h1>

    <p>Ingresa tus credenciales para acceder al sistema.</p>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.entrar') }}" method="POST">
        @csrf

        <label for="email">Correo electrónico:</label>
        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
            required
        >

        <br><br>

        <label for="password">Contraseña:</label>
        <input
            type="password"
            name="password"
            id="password"
            required
        >

        <br><br>

        <button type="submit">Ingresar</button>
    </form>

</body>
</html>
