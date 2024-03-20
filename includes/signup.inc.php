<?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $username = $_POST["username"];
        $userpassword = $_POST["userpassword"];
        $email = $_POST["email"];

        try {
            
            require_once 'dbh.inc.php';
            require_once 'signup_model.inc.php';
            require_once 'signup_contr.inc.php';

            //ERROR HANDLER
            $errors = [];

            if (is_input_empty($username, $userpassword, $email)){
                $errors["empty_input"] = "Fill in all fields!";
            }
            if (is_emial_invalid($email)){
                $errors["invalid_email"] = "Invalid email used!";
            }
            if (is_username_taken($pdo, $username)){
                $errors["username-taken"] = "Username already taken!";
            }
            if (is_email_registered($pdo, $email)){
                $errors["email_used"] = "Email already registered!";
            }
            

            require_once 'config_session.php';

            if($errors){
                $_SESSION["errors_signup"] = $errors;

                $signupData = [
                    "username" => $username,
                    "email" => $email
                ];
                $_SESSION["signup_data"] = $signupData;

                header("Location: ../register.php");
                die();
            }

            create_user($pdo, $userpassword, $username, $email);

            header("Location: ../register.php?signup=success");

            $pdo = null;
            $stmt = null;

            die();

        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }

    }else{
        header("Location: ../register.php");
        die();
    }