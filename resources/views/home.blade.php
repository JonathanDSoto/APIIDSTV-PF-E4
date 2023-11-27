<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Home</title>






  <!-- Favicon -->


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
        <div id="searchResult"></div>
        <button class="btn btn-info mt-3" id="dailyAttendance" data-toggle="modal" data-target="#attendanceModal">Today's Attendance</button>
        <button class="btn btn-secondary mt-3" id="showAll">Show All Users</button>
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

  <!-- Popup Modal -->
  <div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="attendanceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> 
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="attendanceModalLabel">Today's Attendance</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Plan</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody id="attendanceBody">
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#searchMember').submit(function (e) {
        e.preventDefault();
        var searchTerm = $('#memberName').val().toLowerCase();
        if (searchTerm.trim() === '') {
          $('tbody tr').show();
          $('#searchResult').html('');
          return;
        }
        var found = false;
        $('tbody tr').each(function () {
          var fullName = $(this).find('td:nth-child(2)').text().toLowerCase() + ' ' + $(this).find('td:nth-child(3)').text().toLowerCase();
          if (fullName.includes(searchTerm)) {
            found = true;
            $('tbody tr').hide();
            $(this).show();
          }
        });
        if (!found) {
          $('#searchResult').html('<div class="alert alert-danger mt-3" role="alert">No member found with that name and Lastname.</div>');
        } else {
          $('#searchResult').html('');
        }
      });

      $('.registerAttendance').click(function () {
        $(this).text('Attendance Registered').removeClass('btn-success').addClass('btn-secondary').prop('disabled', true);
      });

      $('#dailyAttendance').click(function () {
        var attendanceHTML = '';
        $('tbody tr').each(function () {
          var memberId = $(this).data('id').toString();
          var name = $(this).find('td:nth-child(2)').text();
          var Lastname = $(this).find('td:nth-child(3)').text();
          var plan = $(this).find('td:nth-child(4)').text();
          var email = $(this).find('td:nth-child(5)').text();
          attendanceHTML += `<tr><td>${memberId}</td><td>${name}</td><td>${Lastname}</td><td>${plan}</td><td>${email}</td></tr>`;
        });
        $('#attendanceBody').html(attendanceHTML);
      });

      $('#showAll').click(function () {
        $('tbody tr').show();
      });
    });
  </script>


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
  <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
  <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="../../assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

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