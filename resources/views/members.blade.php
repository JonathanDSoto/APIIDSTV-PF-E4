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
    <h2>Gym Members List</h2>
    <div class="d-flex justify-content-end mb-3">
      <button class="btn btn-success" data-toggle="modal" data-target="#addMemberModal">Add Member</button>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Last Name</th>
          <th>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter by Plan
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#" onclick="filterByPlan('Plan A')">Plan A</a>
                <a class="dropdown-item" href="#" onclick="filterByPlan('Plan B')">Plan B</a>
                <a class="dropdown-item" href="#" onclick="resetPlanFilter()">Show All</a>
              </div>
            </div>
          </th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Juan</td>
          <td>Perez</td>
          <td>Plan A</td>
          <td>juan@example.com</td>
          <td>
            <button class="btn btn-primary btn-sm" onclick="showEditForm(this)">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="showDeleteConfirmation(this)">Delete</button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Juan</td>
          <td>Perez</td>
          <td>Plan B</td>
          <td>juan@example.com</td>
          <td>
            <button class="btn btn-primary btn-sm" onclick="showEditForm(this)">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="showDeleteConfirmation(this)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Add member modal -->
  <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="nombre">Name</label>
              <input type="text" class="form-control" id="nombre" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="apellido">Last Name</label>
              <input type="text" class="form-control" id="apellido" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label for="plan">Plan</label>
              <select class="form-control" id="plan">
                <option>Plan A</option>
                <option>Plan B</option>
              </select>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="text-center mt-3">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" onclick="addMember()">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="nombre">Name</label>
              <input type="text" class="form-control" id="nombre" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="apellido">Last Name</label>
              <input type="text" class="form-control" id="apellido" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label for="plan">Plan</label>
              <select class="form-control" id="plan">
                <option>Plan A</option>
                <option>Plan B</option>
              </select>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="text-center mt-3">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" onclick="addMember()">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit member form -->
  <div class="modal fade" id="editMemberModal" tabindex="-1" role="dialog" aria-labelledby="editMemberModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editMemberModalLabel">Edit Member</h5>
        </div>
        <div class="modal-body">
          <form>
            <input type="hidden" id="memberId">
            <div class="form-group">
              <label for="editName">Name</label>
              <input type="text" class="form-control" id="editName" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="editLastName">Last Name</label>
              <input type="text" class="form-control" id="editLastName" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label for="editPlan">Plan</label>
              <select class="form-control" id="editPlan">
                <option>Plan A</option>
                <option>Plan B</option>
              </select>
            </div>
            <div class="form-group">
              <label for="editEmail">Email</label>
              <input type="email" class="form-control" id="editEmail" placeholder="Email">
            </div>
            <div class="text-center mt-3">
              <button type="submit" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
              <button type="button" class="btn btn-secondary ml-2" onclick="closeEditModal()">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete confirmation modal -->
  <div class="modal fade" id="deleteMemberModal" tabindex="-1" role="dialog" aria-labelledby="deleteMemberModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteMemberModalLabel">Warning!</h5>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this member?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closeWarningModal()">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="deleteMember()">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Filtro por planes -->
  <script>
    function filterByPlan(plan) {
      $('table tbody tr').each(function () {
        var planText = $(this).find('td:eq(3)').text().trim();
        if (plan === "Show All") {
          $(this).show();
        } else {
          if (planText !== plan) {
            $(this).hide();
          } else {
            $(this).show();
          }
        }
      });
    }

    function resetPlanFilter() {
      $('table tbody tr').show();
    }

    function showEditForm(btn) {
      var row = $(btn).closest('tr');
      var id = row.find('td:eq(0)').text().trim();
      var name = row.find('td:eq(1)').text().trim();
      var lastName = row.find('td:eq(2)').text().trim();
      var plan = row.find('td:eq(3)').text().trim();
      var email = row.find('td:eq(4)').text().trim();

      $('#memberId').val(id);
      $('#editName').val(name);
      $('#editLastName').val(lastName);
      $('#editPlan').val(plan);
      $('#editEmail').val(email);

      $('#editMemberModal').modal('show');
    }

    function saveChanges() {
      var id = $('#memberId').val();
      var name = $('#editName').val();
      var lastName = $('#editLastName').val();
      var plan = $('#editPlan').val();
      var email = $('#editEmail').val();

      $('#editMemberModal').modal('hide');
    }

    function closeEditModal() {
      $('#editMemberModal').modal('hide');
    }

    function showDeleteConfirmation(btn) {
      $('#deleteMemberModal').modal('show');
    }

    function deleteMember() {
      $('#deleteMemberModal').modal('hide');
    }

    function closeWarningModal() {
      $('#deleteMemberModal').modal('hide');
    }
  </script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


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