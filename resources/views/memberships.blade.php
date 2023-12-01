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
    <h1>Registro de membresías</h1>
    <!-- <button id="crearButton">Crear Membresías</button> -->
    <table id="tablaDatos">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        @foreach ($memberships as $membership)
        <tr>
            <td>{{ $membership->name }}</td>
            <td>{{ $membership->price }}</td>
            <td style="display: flex; gap: 10px;">
                <button onclick="editarUsuario('{{ $membership->id }}', decodeURIComponent('{{ rawurlencode($membership->name) }}'), decodeURIComponent('{{ rawurlencode($membership->price) }}'), '{{ $membership->email }}')">Editar</button>
                <!-- <form action="/memberships/{{ $membership->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form> -->
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Ventana emergente con el formulario para crear un usuario -->
    <div id="popup">
        <h2 id="popupTitle">Crear Usuario</h2>
        <form id="userForm" action="/memberships" method="POST">
            @csrf
            <input type="hidden" id="method" name="_method" value="POST">
            <label for="name">Nombre:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price"><br>
            <input type="submit" id="submitButton" value="Crear">
        </form>
        <button onclick="document.getElementById('popup').style.display='none'">Cerrar</button>
    </div>

    <script>
        document.getElementById('crearButton').onclick = function() {
            document.getElementById('popupTitle').textContent = 'Crear Membresía';
            document.getElementById('userForm').action = '/memberships';
            document.getElementById('method').value = 'POST';
            document.getElementById('submitButton').value = 'Crear';
            document.getElementById('name').value = '';
            document.getElementById('price').value = '';
            document.getElementById('popup').style.display = 'block';
        };

        function editarUsuario(id, name, price, email) {
            document.getElementById('popupTitle').textContent = 'Editar Membresía';
            document.getElementById('userForm').action = '/memberships/' + id;
            document.getElementById('method').value = 'PUT';
            document.getElementById('submitButton').value = 'Guardar';
            document.getElementById('name').value = name;
            document.getElementById('price').value = price;
            document.getElementById('popup').style.display = 'block';
        }
    </script>
</body>
</html>