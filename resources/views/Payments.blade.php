<!DOCTYPE html>
<html>
<head>
    <title>CRUD Básico</title>
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
        }
    </style>
</head>
<body>
    <h1>Registro de Pagos</h1>
    <button id="crearButton">Crear Pago</button>
    <table id="tablaDatos">
        <tr>
            <th>Nombre del Usuario</th>
            <th>Nombre de la Membresía</th>
            <th>Fecha</th>
        </tr>
        @foreach ($payments as $payment)
        <tr>
            <td>{{ $payment->user->name }}</td>
            <td>{{ $payment->membership->name }}</td>
            <td>{{ $payment->date }}</td>
        </tr>
        @endforeach
    </table>

    <div id="popup">
        <h2 id="popupTitle">Crear Pago</h2>
        <form id="paymentForm" action="/payments" method="POST">
            @csrf
            <input type="hidden" id="method" name="_method" value="POST">
            <label for="user_id">Nombre del Usuario:</label><br>
            <select id="user_id" name="user_id">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            <select><br>
            <label for="memberships_id">Membresía:</label><br>
            <select id="memberships_id" name="memberships_id">
                @foreach ($memberships as $membership)
                <option value="{{ $membership->id }}">{{ $membership->name }}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" id="submitButton" value="Crear">
        </form>
        <button onclick="document.getElementById('popup').style.display='none'">Cerrar</button>
    </div>

    <script>
        document.getElementById('crearButton').onclick = function() {
        document.getElementById('popupTitle').textContent = 'Crear Pago';
        document.getElementById('paymentForm').action = '/payments';
        document.getElementById('method').value = 'POST';
        document.getElementById('submitButton').value = 'Crear';
        document.getElementById('user_id').value = '';
        document.getElementById('memberships_id').value = '';
        document.getElementById('popup').style.display = 'block';
    };

        function editarPago(id, userId, membershipsId, date) {
            document.getElementById('popupTitle').textContent = 'Editar Pago';
            document.getElementById('paymentForm').action = '/payments/' + id;
            document.getElementById('method').value = 'PUT';
            document.getElementById('submitButton').value = 'Guardar';
            document.getElementById('user_id').value = userId;
            document.getElementById('memberships_id').value = membershipsId;
            document.getElementById('popup').style.display = 'block';
        }
    </script>
</body>
</html>
