<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

        .registration-form {
            width: 400px;
            margin: 50px auto;
            font-size: 15px;
        }

        .registration-form form {
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .registration-form h2 {
            margin: 0 0 15px;
            color: #333;
            font-weight: bold;
        }

        .registration-form .form-group {
            margin-bottom: 20px;
        }

        .registration-form label {
            font-weight: normal;
            font-size: 15px;
        }

        .registration-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }

        .registration-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #19aa8d !important;
            border: none;
            min-width: 140px;
        }

        .registration-form .btn:hover,
        .registration-form .btn:focus {
            background: #179b81 !important;
        }

        .registration-form a {
            color: #fff;
            text-decoration: underline;
        }

        .registration-form a:hover {
            text-decoration: none;
        }

        .registration-form form a {
            color: #19aa8d;
            text-decoration: none;
        }

        .registration-form form a:hover {
            text-decoration: underline;
        }

        .registration-form .fa {
            font-size: 21px;
        }

        .registration-form .fa-paper-plane {
            font-size: 18px;
        }

        .registration-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }

        /* Custom styles for visibility */
        .visibility-indicator {
            color: #6c757d;
            font-size: 12px;
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

    <div class="registration-form container">
        <form action="<?= site_url('registerAuth') ?>" method="POST">
            <h2 class="text-center">User Registration</h2>
            <div class="mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="inputUsername" placeholder="Choose a username" required
                        name="username">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-paper-plane"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" id="inputEmail" placeholder="name@example.com" required
                        name="email">
                </div>
                <div id="emailHelp" class="form-text visibility-indicator">We'll never share your email with anyone
                    else.
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelpInline"
                        required name="password" placeholder="Password">
                </div>
                <div id="passwordHelpInline" class="form-text visibility-indicator">
                    Must be 8-20 characters long, 1 uppercase and 1 lowercase plus a symbol.
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                    <input type="password" class="form-control" id="inputConfirmPassword"
                        aria-describedby="passwordHelpInline" required name="confirm-password"
                        placeholder="Confirm Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-700">
            Already a member? <a href="<?= site_url('login') ?>"
                class="text-emerald-600 hover:text-emerald-500">Login</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
