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

    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>
                                <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name'], ENT_QUOTES, 'UTF-8'); ?>
                            </strong>
                        </div>
                        <a href="<?= site_url('student'); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
                <div class="card-body">
                    <h5>Personal Information</h5>
                    <p>Personal information includes a broad range of information, that could identify the student.</p>

                    <form action="<?= site_url('updateProfile'); ?>" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" id="inputFirstName" name="student_id"
                                    value="<?= htmlspecialchars($student['student_id'], ENT_QUOTES, 'UTF-8'); ?>"
                                    required>
                                <div class="form-group">
                                    <label for="inputFirstName">First Name</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name"
                                        value="<?= htmlspecialchars($student['first_name'], ENT_QUOTES, 'UTF-8'); ?>"
                                        required>
                                </div>


                                <div class="form-group">
                                    <label for="inputContactNumber">Contact Number</label>
                                    <input type="text" class="form-control" id="inputContactNumber"
                                        value="<?= htmlspecialchars($student['contact_number'], ENT_QUOTES, 'UTF-8'); ?>"
                                        name="contact_number" required>
                                </div>


                                <div class="form-group">
                                    <label for="inputBirthday">Birthday</label>
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" id="inputBirthday" name="birthday"
                                            value="<?= htmlspecialchars($student['birthday'], ENT_QUOTES, 'UTF-8'); ?>"
                                            required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputSection">Section</label>
                                    <select class="form-control" id="inputSection" name="section" required disabled>
                                        <option value="" disabled>Select Section</option>
                                        <?php $sections = ['F1', 'F2', 'F3', 'F4', 'F5', 'F6']; ?>
                                        <?php foreach ($sections as $section): ?>
                                            <option value="<?= htmlspecialchars($section, ENT_QUOTES, 'UTF-8'); ?>"
                                                <?= (isset($student['section']) && $student['section'] == $section) ? 'selected' : ''; ?>>
                                                <?= htmlspecialchars($section, ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label for="inputLastName">Last Name</label>
                                    <input type="text" class="form-control" id="inputLastName" name="last_name"
                                        value="<?= htmlspecialchars($student['last_name'], ENT_QUOTES, 'UTF-8'); ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email"
                                        value="<?= htmlspecialchars($student['email'] ?? $email, ENT_QUOTES, 'UTF-8'); ?>"
                                        class="form-control" id="inputEmail" name="email" required disabled>
                                </div>

                                <div class="form-group">
                                    <label for="inputCourse">Course</label>
                                    <select class="form-control" id="inputCourse" name="course" required disabled>
                                        <option value="" disabled>Select Course</option>
                                        <?php foreach ($courses as $course): ?>
                                            <option
                                                value="<?= htmlspecialchars($course['course_id'], ENT_QUOTES, 'UTF-8'); ?>"
                                                <?= (isset($student['course']) && $student['course'] == $course['course_id']) ? 'selected' : ''; ?>>
                                                <?= htmlspecialchars($course['course_name'], ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="inputYearLevel">Year Level</label>
                                    <select class="form-control" id="inputYearLevel" name="year_level" required
                                        disabled>

                                        <option value="" disabled>Select Year Level</option>
                                        <option value="First Year" <?= $student['year_level'] == 'First Year' ? 'selected' : '' ?>>First Year</option>
                                        <option value="Second Year" <?= $student['year_level'] == 'Second Year' ? 'selected' : '' ?>>Second Year</option>
                                        <option value="Third Year" <?= $student['year_level'] == 'Third Year' ? 'selected' : '' ?>>Third Year</option>
                                        <option value="Fourth Year" <?= $student['year_level'] == 'Fourth Year' ? 'selected' : '' ?>>Fourth Year</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <textarea class="form-control" id="inputAddress" name="address" rows="5"
                                required><?= htmlspecialchars($student['address'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>


                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>



</body>

</html>