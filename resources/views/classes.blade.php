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
    <h2>Class List</h2>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addClassModal">Add Class</button>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Class</th>
          <th>Instructor</th>
          <th>Registered Members</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        
        <tr class="class-row" id="zumbaRow">
          <td>Zumba</td>
          <td>Carlos</td>
          <td>20</td>
          <td>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editClassModal">Edit</button>
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteClassModal">Delete</button>
            <button class="btn btn-info btn-sm" data-target-info="zumbaInfo">View</button>
          </td>
        </tr>
        <tr class="additional-info" id="zumbaInfo" style="display: none;">
          <td colspan="4">
            <strong>Instructor: </strong>Carlos<br>
            <strong>Schedule: </strong>Zumba Schedule<br>
            <strong>Members:</strong>
            <div style="text-align: right;">
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addMemberModal">Add
                Member</button>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Last Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Andrea</td>
                  <td>Rodriguez</td>
                  <td>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMemberModal">Delete
                      Member</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Miguel</td>
                  <td>Martinez</td>
                  <td>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMemberModal">Delete
                      Member</button>
                  </td>
                </tr>
                <!-- Add more rows for members here -->
              </tbody>
            </table>
          </td>
        </tr>
        <tr class="class-row" id="yogaRow">
          <td>Yoga</td>
          <td>María</td>
          <td>15</td>
          <td>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editClassModal">Edit</button>
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteClassModal">Delete</button>
            <button class="btn btn-info btn-sm" data-target-info="yogaInfo">View</button>
          </td>
        </tr>
        <tr class="additional-info" id="yogaInfo" style="display: none;">
          <td colspan="4">
            <strong>Instructor: </strong>María<br>
            <strong>Schedule: </strong>Yoga Schedule<br>
            <strong>Members:</strong>
            <div style="text-align: right;">
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addMemberModal">Add
                Member</button>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Last Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Elena</td>
                  <td>Gomez</td>
                  <td>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMemberModal">Delete
                      Member</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Pedro</td>
                  <td>Lopez</td>
                  <td>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteMemberModal">Delete
                      Member</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- agregar nuevo miembro -->
  <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMemberModalLabel">Add Member</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="memberNameInput">Name:</label>
            <input type="text" class="form-control" id="memberNameInput">
          </div>
          <div class="form-group">
            <label for="memberLastNameInput">Last Name:</label>
            <input type="text" class="form-control" id="memberLastNameInput">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="addMember()">Add</button>
        </div>
      </div>
    </div>
  </div>

  <!-- agregar nueva clase -->
  <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addClassModalLabel">Add New Class</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="classNameInput">Class Name:</label>
            <input type="text" class="form-control" id="classNameInput">
          </div>
          <div class="form-group">
            <label for="instructorInput">Instructor:</label>
            <input type="text" class="form-control" id="instructorInput">
          </div>
          <div class="form-group">
            <label for="scheduleInput">Schedule:</label>
            <input type="text" class="form-control" id="scheduleInput">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addClass()">Add Class</button>
        </div>
      </div>
    </div>
  </div>

  <!-- editar clase -->
  <div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="editClassModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editClassModalLabel">Edit Class</h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="editClassNameInput">Class Name:</label>
            <input type="text" class="form-control" id="editClassNameInput">
          </div>
          <div class="form-group">
            <label for="editInstructorInput">Instructor:</label>
            <input type="text" class="form-control" id="editInstructorInput">
          </div>
          <div class="form-group">
            <label for="editScheduleInput">Schedule:</label>
            <input type="text" class="form-control" id="editScheduleInput">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- eliminar clase -->
  <div class="modal fade" id="deleteClassModal" tabindex="-1" role="dialog" aria-labelledby="deleteClassModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteClassModalLabel">Delete Class</h5>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete the class "<span id="classNameToDelete"></span>"?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="deleteClass()">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!-- eliminar miembro de la clase  -->
  <div class="modal fade" id="deleteMemberModal" tabindex="-1" role="dialog" aria-labelledby="deleteMemberModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteMemberModalLabel">Delete Member</h5>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete the member "<span id="memberNameToDelete"></span>"?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="deleteMember()">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>

    

    document.addEventListener('DOMContentLoaded', function () {
      const viewButtons = document.querySelectorAll('.btn-info');

      viewButtons.forEach(function (button) {
        button.addEventListener('click', function () {
          const infoId = this.dataset.targetInfo;
          const infoElement = document.getElementById(infoId);

          if (infoElement.style.display === 'none' || infoElement.style.display === '') {
            infoElement.style.display = 'table-row';
          } else {
            infoElement.style.display = 'none';
          }
        });
      });
    });

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