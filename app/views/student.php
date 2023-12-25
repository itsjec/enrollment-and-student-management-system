<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua+One">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


    <title>Document</title>
    <style>
        body {
            color: #333;
            background: #fafafa;
            background-image: url('public/assets/img/background.jpg');
            /* Add the path to your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: "Patua One", sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            /* White overlay */
        }

        .container-lg {
            position: relative;
            z-index: 1;
        }

        .enrollment-form {
            padding: 50px;
            margin: 30px 0;
            background-color: #fff;
            /* White background for the form */
            border-radius: 8px;
        }

        .enrollment-form h1 {
            color: #19bc9d;
            font-weight: bold;
            margin: 0 0 15px;
            text-align: center;
        }

        .enrollment-form .form-control,
        .enrollment-form .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .enrollment-form .form-control:focus {
            border-color: #19bc9d;
        }

        .enrollment-form .btn-primary,
        .enrollment-form .btn-primary:active {
            color: #fff;
            min-width: 150px;
            font-size: 16px;
            background: #19bc9d !important;
            border: none;
        }

        .enrollment-form .btn-primary:hover {
            background: #15a487 !important;
        }

        .enrollment-form .btn i {
            margin-right: 5px;
        }

        .enrollment-form label {
            opacity: 0.7;
        }

        .enrollment-form textarea {
            resize: vertical;
        }

        .hint-text {
            font-size: 15px;
            padding-bottom: 20px;
            opacity: 0.6;
        }

        .logo-container {
            text-align: center;
            padding: 20px;
        }

        .logo {
            max-width: 50%;
            height: auto;
        }

        .icon-circle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #15a487;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 30px
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#inputBirthday').datepicker({
                format: 'yyyy-mm-dd', // Adjust the format as needed
                autoclose: true
            });
        });
    </script>
</head>

<body>
    <div class="navbar navbar-expand-lg navbar-dark" style="background-color: #005c2b;">
        <div class="container-lg">
            <a class="navbar-brand" href="#" style="color: #ffffff;">Mindoro State University</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="addnewstudent" style="color: #ffffff;">Enroll</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student" style="color: #ffffff;">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login" style="color: #ffffff;">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">
                            <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name'], ENT_QUOTES, 'UTF-8') ?>
                        </h3>
                    </div>
                    <div class="col-auto">
                        <a href="<?= site_url('profile') ?>" class="btn btn-primary">Update Profile</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="#personalInfo" data-bs-toggle="tab">Personal Information</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="personalInfo">
                        <div class="row">

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-user fa-2x"></i>
                                </div>
                                <p class="mb-0">
                                    <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-envelope fa-2x"></i>
                                </div>
                                <p class="mb-0">
                                    <?= htmlspecialchars($student['email'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-phone fa-2x"></i>
                                </div>
                                <p class="mb-0">
                                    <?= htmlspecialchars($student['contact_number'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-graduation-cap fa-2x"></i>
                                </div>
                                <p class="mb-0">
                                    <?= htmlspecialchars($student['course'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-layer-group fa-2x"></i>
                                </div>
                                <p class="mb-0">
                                    <?= htmlspecialchars($student['year_level'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <p class="mb-0">
                                    <?= htmlspecialchars($student['section'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-birthday-cake fa-2x"></i>
                                </div>
                                <p class="mb-0">
                                    <?= htmlspecialchars($student['birthday'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-home fa-2x"></i>
                                </div>
                                <p class="mb-0">
                                    <?= htmlspecialchars($student['address'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <div
                                    class="icon-circle bg-light text-black me-3 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-info-circle fa-2x"></i>
                                </div>
                                <p
                                    class="mb-0 <?php echo ($student['status'] == 'Enrolled') ? 'text-success' : (($student['status'] == 'Pending') ? 'text-warning' : 'text-danger'); ?>">
                                    <?= htmlspecialchars($student['status'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>