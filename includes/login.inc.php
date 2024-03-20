<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"];
        $userpassword = $_POST["userpassword"];

        try {
            require_once 'dbh.inc.php';
            require_once 'login_model.inc.php';
            require_once 'login_contr.inc.php';

             //ERROR HANDLER
             $errors = [];

             if (is_input_empty($username, $userpassword)){
                 $errors["empty_input"] = "Fill in all fields!";
             }

             $result = get_user($pdo, $username);

             if(is_username_wrong($result)){
                $errors["login_incorrect"] = "Incorrect Login info";
             }
             if(!is_username_wrong($result) && is_password_wrong($userpassword, $result["userpassword"])){
                $errors["login_incorrect"] = "Incorrect Login info";
             }
 
             require_once 'config_session.php';
 
             if($errors){
                 $_SESSION["errors_login"] = $errors;
 
                 $signupData = [
                    "username" => $username,
                    "email" => $email
                 ];
                 $_SESSION["signup_data"] = $signupData;
 
                 header("Location: ../index.php");
                 die();
             } 

             $newSessionId = session_create_id();
             $SessionId = $newSessionId . "_" . $result["id"];
             session_id($SessionId);

             $_SESSION["user_id"] = $result["id"];
             $_SESSION["user_username"] = htmlspecialchars($result["username"]);

             $_SESSION["last_regeneration"] = time();

             header("Location: ../1st_websitePage.html?login=success");

             $pdo = null;
             $statement = null;
             die();
        } catch (PDOExecption $e) {
            die("Query failed: " . $e->getMessage());
        }
    }else if($_SERVER["REQUEST_METHOS"] === "POST"){
        $username = $_POST["username"];
        $userpassword = $_POST["userpassword"];
    }
    
    else{
        header("Location: ../index.php");
        die();
    }