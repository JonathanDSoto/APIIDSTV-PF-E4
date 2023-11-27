<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>

<h1>Iniciar sesión</h1>

<form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password"><br><br>

    <input type="submit" value="Iniciar sesión">
</form>

</body>
</html>