<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      padding: 10px;
      text-align: center;
    }

    nav {
      display: flex;
      justify-content: center;
      background-color: #444;
      padding: 10px;
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      margin: 0 10px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    nav a:hover {
      background-color: #555;
    }
  </style>
</head>
<body>

  <header>
    <h1>Mindoro State University</h1>
  </header>

  <nav>
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Contact</a>
  </nav>

  <div class="overlay"></div>
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
