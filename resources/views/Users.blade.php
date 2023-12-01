<!DOCTYPE html>
<html>
<head>
    <title>CRUD Básico</title>
    <style>
        /* Estilos para la ventana emergente */
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
    </style>
</head>
<body>
    <h1>Registro de Usuarios</h1>
    <button id="crearButton">Crear Usuario</button>
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
            <td style="display: flex; gap: 10px;">
                <button onclick="editarUsuario('{{ $user->id }}', decodeURIComponent('{{ rawurlencode($user->name) }}'), decodeURIComponent('{{ rawurlencode($user->last_name) }}'), '{{ $user->email }}')">Editar</button>
                <form action="/payments/{{ $user->id }}" method="POST">
                    @csrf
                    <button type="submit">Ver pagos</button>
                </form>
                <form action="/users/{{ $user->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Ventana emergente con el formulario para crear un usuario -->
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

    <script>
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