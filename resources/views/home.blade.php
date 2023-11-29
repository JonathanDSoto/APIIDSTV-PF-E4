<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <!-- Agrega los enlaces a Bootstrap u otros estilos si es necesario -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Home</title>
  <!-- Enlace al archivo CSS externo -->
  <link rel="stylesheet" href="home.css">
</head>
<body>
  <!-- Barra lateral -->
  <div id="sidebar">
    <div class="navbar-brand">
      <span>Menu</span>
    </div>
    <ul class="list-unstyled components">
      <li>
        <a href="#">Inicio</a>
      </li>
      <li>
        <a href="#">Perfil</a>
      </li>
      <li>
        <a href="#">Configuración</a>
      </li>
    </ul>
  </div>

  <div class="container mt-4">
    <h2>Attendance Record</h2>
    <div class="row">
      <div class="col-md-6">
        <form id="searchMember">
          <div class="form-group">
            <label for="memberName">Search by Name:</label>
            <input type="text" class="form-control" id="memberName" placeholder="Enter member's name and Lastname">
          </div>
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>
    <hr>
    <h3>Member Information</h3>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Lastname</th>
          <th>Plan</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr data-id="1">
          <td>1</td>
          <td>Carlos</td>
          <td>González</td>
          <td>Premium Plan</td>
          <td>carlos@example.com</td>
          <td><button class="btn btn-success registerAttendance">Register Attendance</button></td>
        </tr>
        <tr data-id="2">
          <td>2</td>
          <td>Laura</td>
          <td>Hernández</td>
          <td>Basic Plan</td>
          <td>laura@example.com</td>
          <td><button class="btn btn-success registerAttendance">Register Attendance</button></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Script de jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#sidebar").hover(function () {
        $(this).toggleClass("active");
      });
    });
  </script>
</body>
</html>
