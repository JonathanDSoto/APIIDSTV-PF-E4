<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Members</title>

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
    <h2>Types of Plans at the Gym</h2>
    <div class="d-flex justify-content-end mb-3">
      <button class="btn btn-success" data-toggle="modal" data-target="#agregarTarifaModal">Add New Plan</button>
    </div>
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th>Plan Name</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Basic Plan</td>
          <td>$30</td>
          <td>
            <button class="btn btn-primary btn-sm editarTarifa" data-toggle="modal"
              data-target="#editarTarifaModal">Edit</button>
            <button class="btn btn-danger btn-sm eliminarTarifa" data-toggle="modal" data-target="#eliminarTarifaModal"
              data-nombre-tarifa="Basic Plan">Delete</button>
          </td>
        </tr>
        <tr>
          <td>Premium Plan</td>
          <td>$50</td>
          <td>
            <button class="btn btn-primary btn-sm editarTarifa" data-toggle="modal"
              data-target="#editarTarifaModal">Edit</button>
            <button class="btn btn-danger btn-sm eliminarTarifa" data-toggle="modal" data-target="#eliminarTarifaModal"
              data-nombre-tarifa="Premium Plan">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- agregar plan -->
  <div class="modal fade" id="agregarTarifaModal" tabindex="-1" role="dialog" aria-labelledby="agregarTarifaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="agregarTarifaModalLabel">Add New Plan</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="nombrePlan">Plan Name:</label>
              <input type="text" class="form-control" id="nombrePlan">
            </div>
            <div class="form-group">
              <label for="precioPlan">Price:</label>
              <input type="text" class="form-control" id="precioPlan">
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  <!-- editar plan -->
  <div class="modal fade" id="editarTarifaModal" tabindex="-1" role="dialog" aria-labelledby="editarTarifaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarTarifaModalLabel">Edit Plan</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="editarNombrePlan">Plan Name:</label>
              <input type="text" class="form-control" id="editarNombrePlan">
            </div>
            <div class="form-group">
              <label for="editarPrecioPlan">Price:</label>
              <input type="text" class="form-control" id="editarPrecioPlan">
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- eliminar plan -->
  <div class="modal fade" id="eliminarTarifaModal" tabindex="-1" role="dialog"
    aria-labelledby="eliminarTarifaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eliminarTarifaModalLabel">Confirm Deletion</h5>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete the plan "<span id="nombreTarifaEliminar"></span>"?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmarEliminar">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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