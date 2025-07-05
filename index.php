<?php
// include 'nav_bar.php';
session_start();
// if(!isset($_SESSION['userID']) && empty($_SESSION['userID'])) {
	// header("Location:pwp_sales_mngr.php");
// 	exit();
// }

$_SESSION['type_asn'] = false;
$_SESSION['type_sub'] = false;
$_SESSION['type_grp'] = false;

$header ='
<!DOCTYPE html>
<head>

	<link rel="stylesheet" type="text/css" href="css/css_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="js/js_pwp_usr.js" ></script>

    <title>Login Page</title>
</head>

<body>

    <!-- Top Bar with Logo -->
    <div class="top-bar">
        <img src="includes/img/qpc.png.PNG" alt="Quanta Logo" class="logo">
    </div>

    <!-- Login Form -->
    <div class="login-container">
        <form class="login-box" action="php_usrLogin.php" method="POST">
            <img src="includes/img/qpc.png.PNG" alt="Logo" class="form-logo">
            <h2>Login</h2>
            <p>Sign in to your account</p>

            <!-- Static error message (use JS or PHP to display dynamically if needed) -->
            <div class="error-message" style="display: none;">
                Invalid username or password.
            </div>

            <div class="input-group">
                <input type="text" name="uName" placeholder="Username" required>
                <span class="icon">👤</span>
            </div>

            <div class="input-group">
                <input type="password" name="pWord" placeholder="Password" required>
                <span class="icon">🔑</span>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>


';

$footer = '
</body>
</html>';

echo $header.$footer;
