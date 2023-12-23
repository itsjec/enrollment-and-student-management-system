<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Enrollment Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua+One">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <style>
        body {
            color: #333;
            background: #fafafa;
            background-image: url('public/assets/img/background.jpg'); /* Add the path to your background image */
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
            background-color: rgba(255, 255, 255, 0.9); /* White overlay */
        }

        .container-lg {
            position: relative;
            z-index: 1;
        }

        .enrollment-form {
            padding: 50px;
            margin: 30px 0;
            background-color: #fff; /* White background for the form */
            border-radius: 8px;
        }

        .enrollment-form h1 {
            color: #19bc9d;
            font-weight: bold;
            margin: 0 0 15px;
            text-align: center;
        }

        .enrollment-form .form-control, .enrollment-form .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .enrollment-form .form-control:focus {
            border-color: #19bc9d;
        }

        .enrollment-form .btn-primary, .enrollment-form .btn-primary:active {
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
    </style>
    <script>
        $(document).ready(function(){
            $('#inputBirthday').datepicker({
                format: 'yyyy-mm-dd', // Adjust the format as needed
                autoclose: true
            });
        });
    </script>
</head>
<body>

    <div class="overlay"></div>
    <div class="navbar navbar-expand-lg navbar-dark" style="background-color: #005c2b;">
    <div class="container-lg">
        <a class="navbar-brand" href="#" style="color: #ffffff;">Mindoro State University</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <div class="container-lg">
        <div class="logo-container">
            <img src="public/assets/img/Minsu.png" alt="Logo" class="logo">
            <h1>Welcome to Mindoro State University!!</h1>
            <p>Calapan City Campus</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="enrollment-form">
                    <h1>Enroll Now!</h1>
                    <p>Please fill up the form below</p>
                    <form action="<?=site_url('insert'); ?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputFirstName">First Name</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputContactNumber">Contact Number</label>
                                    <input type="text" class="form-control" id="inputContactNumber" name="contact_number" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputBirthday">Birthday</label>
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" id="inputBirthday" name="birthday" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSection">Section</label>
                                    <select class="form-control" id="inputSection" name="section" required>
                                        <option value="" disabled selected>Select Section</option>
                                        <option value="F1">F1</option>
                                        <option value="F2">F2</option>
                                        <option value="F3">F3</option>
                                        <option value="F4">F4</option>
                                        <option value="F5">F5</option>
                                        <option value="F6">F6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputLastName">Last Name</label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputCourse">Course</label>
                                    <select class="form-control" id="inputCourse" name="course">
                                        <option value="" disabled selected>Select Course</option>
                                        <?php foreach ($courses as $course): ?>
                                            <option value="<?= $course['course_name']; ?>"><?= $course['course_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputYearLevel">Year Level</label>
                                    <select class="form-control" id="inputYearLevel" name="year_level" required>
                                        <option value="" disabled selected>Select Year Level</option>
                                        <option value="First Year">First Year</option>
                                        <option value="Second Year">Second Year</option>
                                        <option value="Third Year">Third Year</option>
                                        <option value="Fourth Year">Fourth Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <textarea class="form-control" id="inputAddress" name="address" rows="5" required></textarea>
                        </div> 
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" value="Add"></i> Enroll</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
