<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/loginstyle.css">
    <title>Login & Register</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-header">
            <div class="titles">
                <div class="title-login">Login</div>
                <div class="title-register">Register</div>
            </div>
        </div>

        <!-- LOGIN FORM -->
        <form action="handle_login.php" method="post" class="login-form" autocomplete="off">
            <?php if (!empty($_GET['msg'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    switch($_GET['msg']) {
                        case 'empty_field':
                            echo '<strong>Empty Field</strong><br>Please Enter Email And Password';
                            break;
                        case 'invalid_credentials':
                            echo '<strong>Invalid Credentials</strong><br>Email or password is incorrect';
                            break;
                    }
                    ?>
                </div>
            <?php endif; ?>
            
            <div class="input-box">
                <input type="text" name="email" class="input-field" id="log-email">
                <label for="log-email" class="label">Email</label>
                <i class='bx bx-envelope icon'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" id="log-pass">
                <label for="log-pass" class="label">Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>

            <div class="input-box">
                <button class="btn-submit" id="SignInBtn">Sign In <i class='bx bx-log-in'></i></button>
            </div>
            <div class="switch-form">
                <span>Don't have an account? <a href="#" onclick="registerFunction()">Register</a></span>
            </div>
        </form>

        <!-- REGISTER FORM -->
        <form action="handle_register.php" method="post" class="register-form" autocomplete="off">
            <?php if (!empty($_SESSION["errors"])) : ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    foreach ($_SESSION["errors"] as $error) {
                        echo "<strong>Error</strong><br>" . $error . "<br>";
                    }
                    ?>
                </div>
            <?php endif; ?>

            <div class="input-box">
                <input type="text" name="name" class="input-field" id="reg-name">
                <label for="reg-name" class="label">User Name</label>
                <i class='bx bx-user icon'></i>
            </div>

            <div class="input-box">
                <input type="text" name="email" class="input-field" id="reg-email">
                <label for="reg-email" class="label">Email</label>
                <i class='bx bx-envelope icon'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" class="input-field" id="reg-pass">
                <label for="reg-pass" class="label">Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>
            <div class="input-box">
                <input type="password" name="cp" class="input-field" id="reg-pass-confirm">
                <label for="reg-pass-confirm" class="label">Confirm Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>

            <div class="input-box">
                <button class="btn-submit" id="SignUpBtn">Sign Up <i class='bx bx-user-plus'></i></button>
            </div>
            <div class="switch-form">
                <span>Already have an account? <a href="#" onclick="loginFunction()">Login</a></span>
            </div>
        </form>
    </div>

    <script src="js/loginscript.js"></script>
</body>
</html>

<?php
// إزالة الرسائل بعد العرض
unset($_SESSION["errors"]);
?>
