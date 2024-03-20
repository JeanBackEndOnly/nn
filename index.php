<?php
    require_once 'includes/config_session.php';
    require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup & login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>
    <?php
        output_username();
    ?>
    </h3>
    
    <?php
    if(isset($_SESSION["user_id"])){ ?>
        <div id="container">
            <div>
            <h1>LOGIN</h1>

            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="userpassword" placeholder="Userpassword">
                <button>Login</button>
            </form>
            </div>
        </div>

    <?php } ?>
    
    <?php
        check_login_errors();
    ?>
    <h1 id="login-here"><a href="register.php">Signup here!</a></h1>
</body>
</html>