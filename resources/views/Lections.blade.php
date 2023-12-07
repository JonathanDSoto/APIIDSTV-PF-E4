<!DOCTYPE html>
<html>
<head>
    <title>Lection Management</title>
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
        .actions {
            display: flex;
            gap: 10px;
        }
        .disabled-lection {
            opacity: 0.5;
        }
        .disabled-instructor {
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <h1>Lection Management</h1>
    <button id="createLectionButton">Create Lection</button>
    <button onclick="togglePayments()">
        {{ $showAll ? 'Ver Pagos Activos' : 'Ver Todos los Pagos' }}
    </button>
    <table id="lectionTable">
        <tr>
            <th>User</th>
            <th>Instructor</th>
            <th>Date</th>
            <th>Schedule</th>
            <th>Assistance</th>
            <th>Actions</th>
        </tr>

        @foreach ($lections as $lection)
            <tr class="{{ $lection->trashed() ? 'deleted-row' : '' }} {{ $lection->trashed() ? 'disabled-lection' : '' }}">
                <td>{{ optional($lection->user)->name }}</td>
                <td class="{{ optional($lection->instructor)->trashed() ? 'disabled-instructor' : '' }}">{{ optional($lection->instructor)->name }}</td>
                <td>{{ $lection->date }}</td>
                <td>{{ $lection->schedule }}</td>
                <td>{{ $lection->assistance ? 'Present' : 'Absent' }}</td>
                <td class="actions">
                    <button onclick="editLection('{{ $lection->id }}')" {{ $lection->trashed() ? 'disabled' : '' }}>Edit</button>
                    
                    <form action="/register-assistance/{{ $lection->id }}" method="POST" {{ $lection->trashed() ? 'disabled' : '' }}>
                        @csrf
                        <button type="submit" {{ $lection->trashed() ? 'disabled' : '' }}>
                            @if($lection->assistance)
                                Cancel Assistance
                            @else
                                Register Assistance
                            @endif
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div id="popup">
        <h2 id="popupTitle">Create Lection</h2>
        <form id="lectionForm" action="/lections/{id}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="method" name="_method" value="POST">
            <label for="user_id">User:</label><br>
            <select id="user_id" name="user_id">
                @if($users instanceof \App\Models\User)
                <option value="{{ $users->id }}">{{ $users->name }}</option>
                @elseif($users instanceof \Illuminate\Database\Eloquent\Collection)
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
                @else
                <option>No se pudo obtener el usuario</option>
                @endif
            </select><br>
            <label for="instructor_id">Instructor:</label><br>
            <select id="instructor_id" name="instructor_id">
                @foreach ($instructors as $instructor)
                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                @endforeach
            </select><br>
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date"><br>
            <label for="schedule">Schedule:</label><br>
            <input type="time" id="schedule" name="schedule"><br>
            <input type="submit" id="submitButton" value="Create">
        </form>
        <button onclick="document.getElementById('popup').style.display='none'">Close</button>
    </div>

    <script>
        function togglePayments() {
            var showAll = {{ $showAll ? 'true' : 'false' }};
            window.location.href = '/lections?show_all=' + (showAll ? '0' : '1');
        }
        
        document.getElementById('createLectionButton').onclick = function() {
            document.getElementById('popupTitle').textContent = 'Create Lection';
            document.getElementById('lectionForm').action = '/lections';
            document.getElementById('method').value = 'POST';
            document.getElementById('submitButton').value = 'Create';
            document.getElementById('user_id').value = '';
            document.getElementById('instructor_id').value = '';
            document.getElementById('date').value = '';
            document.getElementById('schedule').value = '';
            document.getElementById('popup').style.display = 'block';
        };

        function editLection(id) {
            fetch('/lections/' + id)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('popupTitle').textContent = 'Edit Lection';
                    document.getElementById('lectionForm').action = '/lections/' + id;
                    document.getElementById('method').value = 'PUT';
                    document.getElementById('submitButton').value = 'Save';
                    document.getElementById('user_id').value = data.user_id;
                    document.getElementById('instructor_id').value = data.instructor_id;
                    document.getElementById('date').value = data.date;
                    document.getElementById('schedule').value = data.schedule;
                    document.getElementById('popup').style.display = 'block';
                });
        }
    </script>
</body>
</html>