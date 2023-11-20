<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Classes</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
    rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
  <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
  <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
  <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
  <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/umd/styles/index.min.css" />

  <!-- Page CSS -->


  <!-- Helpers -->
  <script src="../../assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../../assets/js/config.js"></script>

</head>

<body>

  @include('layouts.sidebar')

  <div class="container mt-4">
    <h2>Lista de Clases</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Clase</th>
          <th>Instructor</th>
          <th>Miembros Inscritos</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr class="class-row" id="yogaRow">
          <td>Yoga</td>
          <td>María</td>
          <td>15</td>
          <td>
            <button class="btn btn-primary btn-sm" onclick="editarClase('Yoga')">Editar</button>
            <button class="btn btn-danger btn-sm" onclick="eliminarClase('Yoga')">Eliminar</button>
            <button class="btn btn-info btn-sm" onclick="toggleInfo('yogaInfo', 'Yoga')">Ver</button>
          </td>
        </tr>
        <tr class="additional-info" id="yogaInfo" style="display: none;">
          <td colspan="4">
            <strong>Instructor: </strong>María<br>
            <strong>Horario: </strong>Horario de Yoga<br>
            <strong>Miembros:</strong>
            <div style="text-align: right;">
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#agregarMiembroModal">Agregar Miembro</button>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Elena</td>
                  <td>Gómez</td>
                  <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminarMiembro('Yoga', 1)">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Pedro</td>
                  <td>López</td>
                  <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminarMiembro('Yoga', 2)">Eliminar</button>
                  </td>
                </tr>
                <!-- Agrega más filas para más miembros -->
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Repite la estructura para más clases si es necesario -->
      </tbody>
    </table>
  </div>

  <!-- Modal para agregar miembro -->
  <div class="modal fade" id="agregarMiembroModal" tabindex="-1" role="dialog" aria-labelledby="agregarMiembroModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="agregarMiembroModalLabel">Agregar Miembro por ID</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="userIdInput">ID del Usuario:</label>
            <input type="number" class="form-control" id="userIdInput">
          </div>
          <div id="errorDisplay" class="text-danger" style="display: none;">El ID de usuario no existe.</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="buscarMiembro()">Agregar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    function toggleInfo(infoId, clase) {
      var info = document.getElementById(infoId);
      if (info.style.display === "none") {
        info.style.display = "table-row";
      } else {
        info.style.display = "none";
      }
    }

    function editarClase(clase) {
      console.log("Editar " + clase);
      // Aquí va la lógica para editar la clase
    }

    function eliminarClase(clase) {
      console.log("Eliminar " + clase);
      // Aquí va la lógica para eliminar la clase
    }

    function eliminarMiembro(clase, id) {
      console.log("Eliminar miembro con ID " + id + " de la clase " + clase);
      // Aquí va la lógica para eliminar el miembro de la clase
    }

    function buscarMiembro() {
      var userId = document.getElementById('userIdInput').value;
      // Simulación de búsqueda
      var usuarios = [
        { id: 1, nombre: 'Elena', apellido: 'Gómez' },
        { id: 2, nombre: 'Pedro', apellido: 'López' }
      ];

      var encontrado = usuarios.find(function(usuario) {
        return usuario.id === parseInt(userId);
      });

      if (encontrado) {
        // Aquí iría la lógica para agregar al miembro a la clase
        console.log("Usuario encontrado: ", encontrado);
      } else {
        var errorDisplay = document.getElementById('errorDisplay');
        errorDisplay.style.display = 'block';
      }
    }
  </script>




  <!-- Core JS -->
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
  <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
  <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="../../assets/vendor/js/menu.js"></script>

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/moment/moment.js"></script>
  <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="../../assets/vendor/libs/select2/select2.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
  <script src="../../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
  <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
  <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/app-user-list.js"></script>

</body>

</html>