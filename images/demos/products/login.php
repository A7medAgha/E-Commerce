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
    <style>
        .error-text {
            color: red;
            font-size: 12px;
            position: absolute;
            bottom: -16px;
            left: 0;
        }

        .input-box {
            position: relative;
            margin-bottom: 40px;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
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

        <?php if (!empty($_GET['msg']) && $_GET['msg'] == 'empty_field') : ?>
            <div class="alert alert-danger" role="alert">
                <strong>Empty Field</strong> <br> Please Enter Email And Password
            </div>
        <?php endif; ?>
        
        <!-- LOGIN FORM -->
        <form action="handle_login.php" method="post" class="login-form" autocomplete="off">
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

            <?php if (!empty($_GET["msg"]) && $_GET["msg"] == 'ar') : ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Alert Heading</strong> You are already Registered, Please Login
                </div>
            <?php unset($_GET['msg']); endif; ?>

            <div class="input-box">
                <input type="text" name="name" class="input-field" id="reg-name"
                    value="<?php echo isset($_SESSION['old']['name']) ? htmlspecialchars($_SESSION['old']['name']) : '' ?>">
                <label for="reg-name" class="label">User Name</label>
                <i class='bx bx-user icon'></i>
                <?php if (isset($_SESSION["errors"]["name"])): ?>
                    <small class="error-text"><?php echo htmlspecialchars($_SESSION["errors"]["name"]); ?></small>
                <?php endif; ?>
            </div>

            <div class="input-box">
                <input type="text" name="email" class="input-field" id="reg-email" aria-label="Email"
                    placeholder="Enter your email"
                    value="<?php echo isset($_SESSION['old']['email']) ? htmlspecialchars($_SESSION['old']['email']) : '' ?>">
                <label for="reg-email" class="label">Email</label>
                <i class='bx bx-envelope icon'></i>
                <?php if (isset($_SESSION["errors"]["email"])): ?>
                    <small class="error-text"><?php echo htmlspecialchars($_SESSION["errors"]["email"]); ?></small>
                <?php endif; ?>
            </div>

            <div class="input-box">
                <input type="password" name="password" class="input-field" id="reg-pass">
                <label for="reg-pass" class="label">Password</label>
                <i class='bx bx-lock-alt icon'></i>
            </div>

            <div class="input-box">
                <input type="password" name="cp" class="input-field" id="reg-confirm-pass">
                <label for="reg-confirm-pass" class="label">Confirm Password</label>
                <i class='bx bx-lock-alt icon'></i>
                <?php if (isset($_SESSION["errors"]["password"])): ?>
                    <small class="error-text"><?php echo htmlspecialchars($_SESSION["errors"]["password"]); ?></small>
                <?php endif; ?>
            </div>

            <div class="input-box">
                <button type="submit" class="btn-submit" id="SignUpBtn">Sign Up <i class='bx bx-user-plus'></i></button>
            </div>
            <div class="switch-form">
                <span>Already have an account? <a href="#" onclick="loginFunction()">Login</a></span>
            </div>
        </form>
    </div>

    <script src="js/loginscript.js"></script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>

<?php
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
?>
