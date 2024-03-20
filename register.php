<?php
    require_once 'includes/config_session.php';
    require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <div>
        <h1>SIGNUP</h1>

            <form action="includes/signup.inc.php" method="post">
                <?php
                    signup_inputs();
                ?>
                <button>Signup</button>
            </form>

            <?php
                check_signup_errors();
            ?>
        </div>
    </div>
<h1 id="login-here"><a href="index.php">Login here!</a></h1>
</body>
</html>