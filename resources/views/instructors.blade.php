<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Instructores</title>
    <style>
        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: white;
            border: 1px solid black;
            z-index: 1000; /* Asegúrate de que el popup se muestre por encima de otros elementos */
        }
    </style>
</head>
<body>
    <h1>Registro de Instructores</h1>
    <button id="crearButton">Crear Instructor</button>
    <button onclick="toggleInstructors()">
        {{ $showAll ? 'Ver Instructores Activos' : 'Ver Todos los Instructores' }}
    </button>
    <table id="tablaDatos">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Especialidad</th>
            <th>Acciones</th>
        </tr>
        @foreach ($instructors as $instructor)
        <tr style="{{ $instructor->trashed() ? 'opacity: 0.5;' : '' }}">
            <td>{{ $instructor->name }}</td>
            <td>{{ $instructor->last_name }}</td>
            <td>{{ $instructor->specialty }}</td>
            <td>
            <div style="display: flex; gap: 10px;">
                <button onclick="editarInstructor('{{ $instructor->id }}', '{{ $instructor->name }}', '{{ $instructor->last_name }}', '{{ $instructor->specialty }}')" {{ $instructor->trashed() ? 'disabled' : '' }}>
                    Editar
                </button>
                <form action="/instructors/{{ $instructor->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" {{ $instructor->trashed() ? 'disabled' : '' }}>
                        Eliminar
                    </button>
                </form>
            </div>
        </td>
        </tr>
        @endforeach
    </table>

    <!-- Ventana emergente con el formulario para crear un instructor -->
    <div id="popup">
        <h2 id="popupTitle">Crear Instructor</h2>
        <form id="instructorForm" action="/instructors" method="POST">
            @csrf
            <input type="hidden" id="method" name="_method" value="POST">
            <label for="name">Nombre:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="last_name">Apellido:</label><br>
            <input type="text" id="last_name" name="last_name"><br>
            <label for="specialty">Especialidad:</label><br>
            <input type="text" id="specialty" name="specialty"><br>
            <input type="submit" id="submitButton" value="Crear">
        </form>
        <button onclick="document.getElementById('popup').style.display='none'">Cerrar</button>
    </div>

    <script>
        function toggleInstructors() {
            var showAll = {{ $showAll ? 'true' : 'false' }};
            window.location.href = '/instructors?show_all=' + (showAll ? '0' : '1');
        }

        document.getElementById('crearButton').onclick = function() {
            document.getElementById('popupTitle').textContent = 'Crear Instructor';
            document.getElementById('instructorForm').action = '/instructors';
            document.getElementById('method').value = 'POST';
            document.getElementById('submitButton').value = 'Crear';
            document.getElementById('name').value = '';
            document.getElementById('last_name').value = '';
            document.getElementById('specialty').value = '';
            document.getElementById('popup').style.display = 'block';
        };

        function editarInstructor(id, name, lastName, specialty) {
            document.getElementById('popupTitle').textContent = 'Editar Instructor';
            document.getElementById('instructorForm').action = '/instructors/' + id;
            document.getElementById('method').value = 'PUT';
            document.getElementById('submitButton').value = 'Guardar';
            document.getElementById('name').value = name;
            document.getElementById('last_name').value = lastName;
            document.getElementById('specialty').value = specialty;
            document.getElementById('popup').style.display = 'block';
        }
    </script>
</body>
</html>