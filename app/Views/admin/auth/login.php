<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to ci4-auth</title>
    <meta charset="UTF-8">
    <meta name="description" content="Example of simple auth in CodeIgniter 4 ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link href="<?= base_url('bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('jquery-ui-1.14.0/jquery-ui.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('jquery-ui-1.14.0/jquery-ui.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>


    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">

        <div id="login_form">
            <form id="login">
                <img class="mb-4" src="<?= site_url('/img/letterV.png') ?>" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating" id="email_container">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating" id="password_container">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" id="login">Sign in</button>
                <p class="mt-5 mb-3 text-muted"><a href="#" onclick="password_reset();">Forgot password</a></p>
            </form>

        </div>



       
    </main>
    <script>
        function password_reset() {
            $.ajax({
            url: '<?= base_url('admin/getResetPasswordForm') ?>',
            type: 'GET',
            success: function(response) {
                // Insert the response (HTML form) into a container on the page
                $('#login_form').html(response);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching the form:", error);
            }
        });
        }
    </script>
</body>

</html>