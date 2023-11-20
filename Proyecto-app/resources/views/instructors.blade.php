<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Instructors</title>

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
    <h2>Lista de Instructores</h2>
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#agregarInstructorModal">Agregar Instructor</button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr data-toggle="collapse" data-target="#clasesInstructor1" aria-expanded="false" aria-controls="clasesInstructor1">
                <td>1</td>
                <td>Juan</td>
                <td>Pérez</td>
                <td>juan@example.com</td>
                <td>123-456-7890</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarInstructorModal">Editar</button>
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="p-0">
                    <div id="clasesInstructor1" class="collapse">
                        <div class="card card-body">
                            Clases que imparte Juan:
                            <ul>
                                <li>Clase A</li>
                                <li>Clase B</li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            <tr data-toggle="collapse" data-target="#clasesInstructor2" aria-expanded="false" aria-controls="clasesInstructor2">
                <td>2</td>
                <td>Maria</td>
                <td>García</td>
                <td>maria@example.com</td>
                <td>987-654-3210</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editarInstructorModal">Editar</button>
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="p-0">
                    <div id="clasesInstructor2" class="collapse">
                        <div class="card card-body">
                            Clases que imparte Maria:
                            <ul>
                                <li>Clase C</li>
                                <li>Clase D</li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Ventana agregar instructor -->
<div class="modal fade" id="agregarInstructorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Instructor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Vntana editar instructor -->
<div class="modal fade" id="editarInstructorModal" tabindex="-1" role="dialog" aria-labelledby="editarInstructorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarInstructorModalLabel">Editar Instructor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="editNombre">Nombre:</label>
                        <input type="text" class="form-control" id="editNombre">
                    </div>
                    <div class="form-group">
                        <label for="editApellido">Apellido:</label>
                        <input type="text" class="form-control" id="editApellido">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input type="email" class="form-control" id="editEmail">
                    </div>
                    <div class="form-group">
                        <label for="editTelefono">Teléfono:</label>
                        <input type="text" class="form-control" id="editTelefono">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap JS y dependencias -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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