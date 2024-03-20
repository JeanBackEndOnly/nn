<?php

    declare(strict_types=1);

    function get_username(object $pdo, string $username){
        $query = "SELECT username FROM kristel_db WHERE username = :username;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function get_email(object $pdo, string $email){
        $query = "SELECT email FROM kristel_db WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function set_user(object $pdo, string $userpassword, string $username, string $email){
        $query = "INSERT INTO kristel_db (username, userpassword, email) VALUES (:username, :userpassword, :email);";
        $stmt = $pdo->prepare($query);
        $options = [
            'cost' => 12
        ];
        $hasedpassword = password_hash($userpassword, PASSWORD_BCRYPT, $options);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":userpassword", $hasedpassword);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    }