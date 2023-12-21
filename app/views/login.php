<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Bootstrap Sign up Form with Icons</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #fff;
            background: #19aa8d;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            font-size: 15px;
        }

        .form-control,
        .form-control:focus,
        .input-group-text {
            border-color: #e1e1e1;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .login-form {
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;
        }

        .login-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }

        .login-form hr {
            margin: 0 -30px 20px;
        }

        .login-form .form-group {
            margin-bottom: 20px;
        }

        .login-form label {
            font-weight: normal;
            font-size: 15px;
        }

        .login-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }

        .login-form .input-group-addon {
            max-width: 42px;
            text-align: center;
        }

        .login-form .btn,
        .login-form .btn:active {
            font-size: 16px;
            font-weight: bold;
            background: #19aa8d !important;
            border: none;
            min-width: 140px;
        }

        .login-form .btn:hover,
        .login-form .btn:focus {
            background: #179b81 !important;
        }

        .login-form a {
            color: #fff;
            text-decoration: underline;
        }

        .login-form a:hover {
            text-decoration: none;
        }

        .login-form form a {
            color: #19aa8d;
            text-decoration: none;
        }

        .login-form form a:hover {
            text-decoration: underline;
        }

        .login-form .fa {
            font-size: 21px;
        }

        .login-form .fa-paper-plane {
            font-size: 18px;
        }

        .login-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!empty($_SESSION['errors'])): ?>
            <div class="alert alert-danger" role="alert">
                <strong class="font-weight-bold">Error!</strong>
                <span class="d-block">
                    <?php
                    $errorMessages = is_array($_SESSION['errors']) ? $_SESSION['errors'] : [$_SESSION['errors']];
                    echo implode('<br>', $errorMessages);
                    ?>
                </span>
            </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success" role="alert">
                <strong class="font-weight-bold">Success!</strong>
                <span class="d-block">
                    <?php echo $_SESSION['success']; ?>
                </span>
            </div>
        <?php endif; ?>
    </div>

    <div class="login-form container">
        <form action="<?= site_url('loginAuth') ?>" method="POST">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="inputUsername" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                <a href="#" class="float-right">Forgot Password?</a>
            </div>
        </form>
        <p class="text-center"><a href="<?= site_url('register') ?>">Create an Account</a></p>
    </div>
</body>
</html>
