<!DOCTYPE html>
<html>
<head>
    <title>Registro de usuario</title>
</head>
<body>

<h1>Registro</h1>

<form method="POST" action="{{ route('register.submit') }}">
    @csrf

    <label for="name">Nombre:</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="lastname">Apellido:</label><br>
    <input type="text" id="lastname" name="lastname"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password"><br><br>

    <input type="submit" value="Registrarse">
</form>

</body>
</html>