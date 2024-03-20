<?php

declare(strict_types=1);

function is_input_empty(string $username, string $userpassword){
    if(empty($username) || empty($userpassword)){
        return true;
    }else{
        return false;
    }
}

function is_username_wrong(bool|array $result){
    if(!$result){
        return true;
    }else{
        return false;
    }
}

function is_password_wrong(string $userpassword, string $hasedpassword){
    if(!password_verify($userpassword, $hasedpassword)){
        return true;
    }else{
        return false;
    }
}