<?php
session_start();
require_once("../api/connect.php");
if($_SESSION["permissions"] == "ADMIN"){
    $data["login"] = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
    $data["password_hash"] = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);
    $data["email"] = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $data["name"] = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $data["surname"] = filter_input(INPUT_POST, "surname", FILTER_SANITIZE_STRING);
    $data["permissions"] = filter_input(INPUT_POST, "permissions", FILTER_SANITIZE_STRING);
    if(!($data["login"] == "" && $data[""] == "" && $data["email"] == "" && $data["name"] == ""  && $data["surname"] == "" && ($data["permissions"] == "STUDENT" || $data["permissions"] == "TEACHER" || $data["permissions"] == "ADMIN"))){
        try{
            $data["password_hash"] = password_hash($data["password_hash"],PASSWORD_BCRYPT);
            $db = connect();
            $sql = "INSERT INTO users VALUES (DEFAULT,:login,:password_hash,:email,:name,:surname,:permissions)";
            $db->prepare($sql)->execute($data);
        }catch(Exception | PDOException $err){
            echo $err;
            http_response_code (500);
        }
    }else{
        http_response_code (400);
    }
}else{
    http_response_code (401);
}
?>
