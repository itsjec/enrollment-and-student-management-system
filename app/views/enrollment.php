<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="public/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="public/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="public/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">


    <style>
      /* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
    </style>
    <script>
      function acceptStudent(studentId) {
          $.ajax({
              url: '<?= site_URL('updateStatus'); ?>',
              type: 'POST',
              data: { student_id: studentId },
              success: function (response) {
                  // Handle success, e.g., update UI or close modal
                  console.log(response);
                  $('#editEmployeeModal' + studentId).modal('hide');
              },
              error: function (error) {
                  // Handle error
                  console.error(error);
              }
          });
      }
  </script>

</head>
<body>
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
        <img src="public/assets/img/Minsu.png" alt="Logo" height="50" class="me-2 d-inline-block align-top"> <!-- Logo above text -->
        <span class="ms-1 font-weight-bold text-white d-inline-block align-middle">Mindoro State University</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="admin">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="managestudent">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Manage Students</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="enrollment">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Pending Students</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="login">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Enrollement</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Enrollment</h6>
        </nav>
      </div>
    </nav>
    <div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Pending Students Table</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr class="text-center">
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">First Name</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Name</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year Level</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Section</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($enrolledStudents as $student): ?>
                          <tr>
                                  <td class="text-center">
                                      <!-- Use the first name from your data source -->
                                      <span class="text-secondary text-xs font-weight-bold"><?= $student['first_name']; ?></span>
                                  </td>
                                  <td class="text-center">
                                      <!-- Use the last name from your data source -->
                                      <span class="text-secondary text-xs font-weight-bold"><?= $student['last_name']; ?></span>
                                  </td>
                                  <td class="text-center">
                                      <!-- Use the course from your data source -->
                                      <span class="text-secondary text-xs font-weight-bold"><?= $student['course']; ?></span>
                                  </td>
                                  <td class="text-center">
                                      <!-- Use the section and year from your data source -->
                                      <span class="text-secondary text-xs font-weight-bold"><?= $student['address']; ?></span>
                                  </td>
                                  <td class="text-center">
                                      <!-- Use the section and year from your data source -->
                                      <span class="text-secondary text-xs font-weight-bold"><?= $student['year_level']; ?></span>
                                  </td>
                                  <td class="text-center">
                                      <!-- Use the section and year from your data source -->
                                      <span class="text-secondary text-xs font-weight-bold"><?= $student['section']; ?></span>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                      <!-- Use the status from your data source (e.g., Enrolled, Pending) -->
                                      <span class="badge badge-sm bg-gradient-success"><?= $student['status']; ?></span>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                  <a href="#editEmployeeModal<?= $student['student_id']; ?>" class="btn btn-success edit" data-toggle="modal">
                                      <i class="material-icons" data-toggle="tooltip" title="Accept">check</i>
                                  </a>
                                  <a href="#deleteEmployeeModal<?= $student['student_id']; ?>" class="btn btn-danger delete" data-toggle="modal">
                                      <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                  </a>
                                </td>
                              </tr>   

                                <!-- Edit Modal HTML -->
                                <div id="editEmployeeModal<?= $student['student_id']; ?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form action="<?= site_url('/updateStatus'); ?>" method="post">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Accept the Student?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to enroll this student in the course?</p>
                                                <p class="text-warning"><small>You can always update the student record.</small></p>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <a href="<?= site_URL('updateStatus/' . $student['student_id']); ?>" class="btn btn-danger">Accept</a>
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                                </div>

                              <!-- Delete Modal HTML -->
                              <div id="deleteEmployeeModal<?= $student['student_id']; ?>" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <form>
                                              <div class="modal-header">
                                                  <h4 class="modal-title">Discard Student Enrollment?</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              </div>
                                              <div class="modal-body">
                                                  <p>Are you sure you want to delete this Record?</p>
                                                  <p class="text-warning"><small>This action cannot be undone.</small></p>
                                              </div>
                                              <div class="modal-footer">
                                                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                  <a href="<?= site_URL('deleteagain/' . $student['student_id']); ?>" type="submit"
                                                      class="btn btn-danger">Delete</a>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>


                          <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>