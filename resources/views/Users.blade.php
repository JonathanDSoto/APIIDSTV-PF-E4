<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Básico</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center; /* Align items vertically in the center */
        }

        .action-buttons button {
            padding: 8px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-bottom: 0; /* Remove the margin-bottom */
        }

        #container {
            width: 80%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: auto; /* Change from 'hidden' to 'auto' */
            margin: 20px;
            padding: 10px;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        table {
            width: calc(100% - 20px); /* Establecer la anchura de la tabla al 100% del contenedor */
            border-collapse: collapse;
            margin: 10px; /* Reducir el margen de la tabla */
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .deleted-row {
            opacity: 0.5;
        }

        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: white;
            border: 1px solid black;
        }

        #popupTitle {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin: 0;
            border-radius: 4px 4px 0 0;
        }

        #paymentForm {
            padding: 20px;
        }

        select, input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        #submitButton {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        #popup button {
            background-color: #ccc;
            color: #333;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Registro de Usuarios</h1>
        <button id="crearButton">Crear Usuario</button>
        <button onclick="toggleUsers()">
            {{ $showAll ? 'Ver Usuarios Activos' : 'Ver Todos los Usuarios' }}
        </button>
        <table id="tablaDatos">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td class="action-buttons">
                    <button onclick="editarUsuario('{{ $user->id }}', decodeURIComponent('{{ rawurlencode($user->name) }}'), decodeURIComponent('{{ rawurlencode($user->last_name) }}'), '{{ $user->email }}')" {{ $user->trashed() ? 'disabled' : '' }}>Editar</button>
                    <form action="/payments/{{ $user->id }}" method="POST">
                        @csrf
                        <button type="submit">Ver pagos</button>
                    </form>
                    <form action="/users/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" {{ $user->trashed() ? 'disabled' : '' }}>Eliminar</button>
                    </form>
                    @if ($user->trashed())
                    <form action="/users/restore/{{ $user->id }}" method="POST">
                        @csrf
                        <button type="submit">Habilitar Cuenta</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>

        <div id="popup">
            <h2 id="popupTitle">Crear Usuario</h2>
            <form id="userForm" action="/users" method="POST">
                @csrf
                <input type="hidden" id="method" name="_method" value="POST">
                <label for="name">Nombre:</label><br>
                <input type="text" id="name" name="name"><br>
                <label for="last_name">Apellido:</label><br>
                <input type="text" id="last_name" name="last_name"><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>
                <label for="password">Contraseña:</label><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit" id="submitButton" value="Crear">
            </form>
            <button onclick="document.getElementById('popup').style.display='none'">Cerrar</button>
        </div>
    </div>

    <script>
        function toggleUsers() {
            var showAll = {{ $showAll ? 'true' : 'false' }};
            window.location.href = '/users?show_all=' + (showAll ? '0' : '1');
        }

        document.getElementById('crearButton').onclick = function() {
            document.getElementById('popupTitle').textContent = 'Crear Usuario';
            document.getElementById('userForm').action = '/users';
            document.getElementById('method').value = 'POST';
            document.getElementById('submitButton').value = 'Crear';
            document.getElementById('name').value = '';
            document.getElementById('last_name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
            document.getElementById('popup').style.display = 'block';
        };

        function editarUsuario(id, name, lastName, email) {
            document.getElementById('popupTitle').textContent = 'Editar Usuario';
            document.getElementById('userForm').action = '/users/' + id;
            document.getElementById('method').value = 'PUT';
            document.getElementById('submitButton').value = 'Guardar';
            document.getElementById('name').value = name;
            document.getElementById('last_name').value = lastName;
            document.getElementById('email').value = email;
            document.getElementById('password').value = '';
            document.getElementById('popup').style.display = 'block';
        }
    </script>
</body>
</html>