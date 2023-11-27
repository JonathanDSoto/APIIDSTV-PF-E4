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
        <h1>Lista de Instructores</h1>
        <div class="text-right mb-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#addInstructorModal">Agregar
                Instructor</button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>123-456-7890</td>
                    <td>johndoe@example.com</td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"
                            data-instructor="John">Editar</button>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                        <button class="btn btn-info btn-sm" onclick="toggleAdditionalInfo('johnInfo')">Ver</button>
                    </td>
                </tr>
                <tr class="additional-info" id="johnInfo" style="display: none;">
                    <td colspan="5">
                        <div class="d-flex justify-content-end mb-2">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#assignClassModal"
                                onclick="populateModal('John')">Asignar Clase</button>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Clase</th>
                                    <th scope="col">Horario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Clase 1</td>
                                    <td>Lunes 9:00 AM - 11:00 AM</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="deleteClass('Clase 1')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Clase 2</td>
                                    <td>Miércoles 2:00 PM - 4:00 PM</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="deleteClass('Clase 2')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Clase 3</td>
                                    <td>Viernes 10:00 AM - 12:00 PM</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="deleteClass('Clase 3')">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Jane</td>
                    <td>Smith</td>
                    <td>987-654-3210</td>
                    <td>janesmith@example.com</td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"
                            data-instructor="Jane">Editar</button>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                        <button class="btn btn-info btn-sm" onclick="toggleAdditionalInfo('janeInfo')">Ver</button>
                    </td>
                </tr>
                <tr class="additional-info" id="janeInfo" style="display: none;">
                    <td colspan="5">
                        <div class="d-flex justify-content-end mb-2">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#assignClassModal"
                                onclick="populateModal('Jane')">Asignar Clase</button>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Clase</th>
                                    <th scope="col">Horario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Clase A</td>
                                    <td>Martes 3:00 PM - 5:00 PM</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="deleteClass('Clase A')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Clase B</td>
                                    <td>Jueves 9:00 AM - 11:00 AM</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="deleteClass('Clase B')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Clase C</td>
                                    <td>Sábado 11:00 AM - 1:00 PM</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="deleteClass('Clase C')">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Asignar clase -->
    <div class="modal fade" id="assignClassModal" tabindex="-1" role="dialog" aria-labelledby="assignClassModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignClassModalLabel">Asignar Clase</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="searchInput">Buscar por nombre de clase:</label>
                        <input type="text" class="form-control" id="searchInput"
                            placeholder="Ingrese el nombre de la clase">
                    </div>
                    <div id="classSearchResults">
                        <!-- Aquí se mostrarán los resultados de la búsqueda -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="assignButton">Asignar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Editar instructor -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Instructor</h5>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="editInstructorName">Nombre</label>
                            <input type="text" class="form-control" id="editInstructorName">
                        </div>
                        <div class="form-group">
                            <label for="editInstructorLastName">Apellido</label>
                            <input type="text" class="form-control" id="editInstructorLastName">
                        </div>
                        <div class="form-group">
                            <label for="editInstructorPhone">Celular</label>
                            <input type="text" class="form-control" id="editInstructorPhone">
                        </div>
                        <div class="form-group">
                            <label for="editInstructorEmail">Email</label>
                            <input type="email" class="form-control" id="editInstructorEmail">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="saveChanges()">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Agregar un nuevo instructor -->
    <div class="modal fade" id="addInstructorModal" tabindex="-1" role="dialog"
        aria-labelledby="addInstructorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addInstructorModalLabel">Agregar Nuevo Instructor</h5>
                </div>
                <div class="modal-body">
                    <form id="addInstructorForm">
                        <div class="form-group">
                            <label for="instructorName">Nombre</label>
                            <input type="text" class="form-control" id="instructorName"
                                placeholder="Ingrese el nombre del instructor">
                        </div>
                        <div class="form-group">
                            <label for="instructorLastName">Apellido</label>
                            <input type="text" class="form-control" id="instructorLastName"
                                placeholder="Ingrese el apellido del instructor">
                        </div>
                        <div class="form-group">
                            <label for="instructorPhone">Celular</label>
                            <input type="text" class="form-control" id="instructorPhone"
                                placeholder="Ingrese el número de celular del instructor">
                        </div>
                        <div class="form-group">
                            <label for="instructorEmail">Email</label>
                            <input type="email" class="form-control" id="instructorEmail"
                                placeholder="Ingrese el correo electrónico del instructor">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewInstructor()">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toggleAdditionalInfo(infoId) {
            var info = document.getElementById(infoId);
            if (info.style.display === "none" || info.style.display === "") {
                info.style.display = "table-row";
            } else {
                info.style.display = "none";
            }
        }

        function populateModal(instructorName) {
            var modalTitle = document.getElementById('assignClassModalLabel');
            modalTitle.textContent = 'Asignar Clase a ' + instructorName;

        }

    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>


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