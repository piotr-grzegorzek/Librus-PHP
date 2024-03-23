<?php
session_start();
require_once("../api/connect.php");
$login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
$passw = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);
if($login != ""){
    try{
        $db = connect();
        $stmt = $db->query("SELECT * FROM users WHERE login ='$login';" );
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(password_verify($passw, $res["password_hash"])){
            $_SESSION["id"] = $res["id"];
            $_SESSION["login"] = $res["login"];
            $_SESSION["email"] = $res["email"];
            $_SESSION["name"] = $res["name"];
            $_SESSION["surname"] = $res["surname"];
            $_SESSION["permissions"] = $res["permissions"];
            echo json_encode($_SESSION);
            http_response_code (200);
        }else{
            session_unset();
            session_destroy();
            http_response_code (401);
        }
    }catch(Exception | PDOException $err){
        session_unset();
        session_destroy();
        http_response_code (500);
    }
}else{
    session_unset();
    session_destroy();
    http_response_code (400);
}

?>
