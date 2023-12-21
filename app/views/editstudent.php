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
    <div class="container-lg">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="enrollment-form">
                    <h1>Edit Student!</h1>
                    <p>Please fill up the form below</p>
                    <form action="<?=site_url('update/') ?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputFirstName">First Name</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" value="<?=$user['first_name']?>" required>
                                    <input type="hidden" class="form-control" id="inputFirstName" name="student_id" value="<?=$user['student_id']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputContactNumber">Contact Number</label>
                                    <input type="text" class="form-control" id="inputContactNumber" name="contact_number" value="<?=$user['contact_number']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputBirthday">Birthday</label>
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" id="inputBirthday" name="birthday" value="<?=$user['birthday']?>" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSection">Section</label>
                                    <select class="form-control" id="inputSection" name="section_year" required>
                                        <option value="" disabled>Select Section</option>
                                        <option value="F1"<?php if($user['section'] === 'F1') echo 'selected'?>>F1</option>
                                        <option value="F2"<?php if($user['section'] === 'F2') echo 'selected'?>>F2</option>
                                        <option value="F3"<?php if($user['section'] === 'F3') echo 'selected'?>>F3</option>
                                        <option value="F4"<?php if($user['section'] === 'F4') echo 'selected'?>>F4</option>
                                        <option value="F5"<?php if($user['section'] === 'F5') echo 'selected'?>>F5</option>
                                        <option value="F6"<?php if($user['section'] === 'F6') echo 'selected'?>>F6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputLastName">Last Name</label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" value="<?=$user['last_name']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" value="<?=$user['email']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputCourse">Course</label>
                                    <select class="form-control" id="inputCourse" name="course_id" value="<?=$user['course_id']?>" >
                                        <option value="" disabled selected>Select Course</option>
                                        <?php foreach ($courses as $course): ?>
                                            <option value="<?= $course['course_id']; ?>"><?= $course['course_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputYearLevel">Year Level</label>
                                    <select class="form-control" id="inputYearLevel" name="year_level" required>
                                        <option value="" disabled >Select Year Level</option>
                                        <option value="First Year" <?php if($user['year_level'] === 'First Year') echo 'selected'?>>First Year</option>
                                        <option value="Second Year" <?php if($user['year_level'] === 'Second Year') echo 'selected'?>>Second Year</option>
                                        <option value="Third Year" <?php if($user['year_level'] === 'Third Year') echo 'selected'?>>Third Year</option>
                                        <option value="Fourth Year" <?php if($user['year_level'] === 'Fourth Year') echo 'selected'?>>Fourth Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <textarea class="form-control" id="inputAddress" name="address" rows="5" value="<?=$user['address']?>" required></textarea>
                        </div> 
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" value="Add"></i> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
