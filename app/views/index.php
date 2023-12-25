<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="public/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="public/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="public/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

  <script>
    $(document).ready(function () {
      // Activate tooltip
      $('[data-toggle="tooltip"]').tooltip();

      // Select/Deselect checkboxes
      var checkbox = $('table tbody input[type="checkbox"]');
      $("#selectAll").click(function () {
        if (this.checked) {
          checkbox.each(function () {
            this.checked = true;
          });
        } else {
          checkbox.each(function () {
            this.checked = false;
          });
        }
      });
      checkbox.click(function () {
        if (!this.checked) {
          $("#selectAll").prop("checked", false);
        }
      });
    });
  </script>
  <style>
    .input-group-outline {
      display: flex;
      align-items: center;
    }

    .input-group-outline input,
    .input-group-outline button {
      margin: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .search-container {
      display: flex;
      align-items: center;
      margin-top: 20px;
    }

    .input-group-outline {
      width: 100%;
      max-width: 400px;
      margin: auto;
    }

    .form-control {
      border-radius: 20px;
    }

    #searchButton {
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
    }
  </style>
</head>

<body>

  <body class="g-sidenav-show  bg-gray-200">
    <aside
      class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
      id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
          aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard"
          target="_blank">
          <img src="public/assets/img/Minsu.png" alt="Logo" height="50" class="me-2 d-inline-block align-top">
          <!-- Logo above text -->
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
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <form method="POST" action="<?php echo site_url('search'); ?>">
                <div class="input-group input-group-outline">
                  <input type="text" name="searchTerm" class="form-control" id="searchInput"
                    placeholder="Search Student...">
                  <button type="submit" class="btn btn-outline-secondary" id="searchButton">Search</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </nav>
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div
                  class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">weekend</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">All Students</p>
                  <h4 class="mb-0">

                    <?= $total_students; ?>

                  </h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">100% </span>total population</p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div
                  class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Enrolled Students</p>
                  <h4 class="mb-0">
                    <?= $enrolled_students; ?>
                  </h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">100 </span>than last month</p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div
                  class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Pending Enrollees</p>
                  <h4 class="mb-0">
                    <?= $pending_enrollees; ?>
                  </h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">30</span> new enrollees</p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div
                  class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">weekend</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Dropped </p>
                  <h4 class="mb-0">
                    <?= $dropped_students; ?>
                  </h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">2 </span> dropped yesterday</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">All Students</h6>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Number
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birthday</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year Level</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($students as $student): ?>
                      <tr>
                        <td class="text-center">
                          <!-- Use the first name from your data source -->
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $student['first_name']; ?>
                          </span>
                        </td>
                        <td class="text-center">
                          <!-- Use the last name from your data source -->
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $student['last_name']; ?>
                          </span>
                        </td>
                        <td class="text-center">
                          <!-- Use the course from your data source -->
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $student['course']; ?>
                          </span>
                        </td>
                        <td class="text-center">
                          <!-- Use the email from your data source -->
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $student['email']; ?>
                          </span>
                        </td>
                        <td class="text-center">
                          <!-- Use the contact number from your data source -->
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $student['contact_number']; ?>
                          </span>
                        </td>
                        <td class="text-center">
                          <!-- Use the birthday from your data source -->
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $student['birthday']; ?>
                          </span>
                        </td>
                        <td class="text-center">
                          <!-- Use the address from your data source -->
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $student['address']; ?>
                          </span>
                        </td>
                        <td class="text-center">
                          <!-- Use the year level from your data source -->
                          <span class="text-secondary text-xs font-weight-bold">
                            <?php echo $student['year_level']; ?>
                          </span>
                        </td>
                        <td class="text-center">
                          <!-- Use the status from your data source (e.g., Enrolled, Pending) -->
                          <span class="badge badge-sm bg-gradient-success">
                            <?php echo $student['status']; ?>
                          </span>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
  </body>

</html>