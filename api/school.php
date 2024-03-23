<?php
session_start();
require_once("../internal/common.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_SESSION["permissions"] == "ADMIN"){
        //name street city phone email nip 
        $data["title"]=filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $data["desc"]=filter_input(INPUT_POST, "desc", FILTER_SANITIZE_STRING);
        $data["key"]=filter_input(INPUT_POST, "key", FILTER_SANITIZE_STRING);
        $data["name"]=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $data["street"]=filter_input(INPUT_POST, "street", FILTER_SANITIZE_STRING);
        $data["city"]=filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING);
        $data["phone"]=filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
        $data["nip"]=filter_input(INPUT_POST, "nip", FILTER_SANITIZE_NUMBER_INT);
        $data["email"] = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        write_php_ini($data, "../internal/school.ini");
    }else{
        http_response_code (401);
    }
}else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    echo json_encode(parse_ini_file("../internal/school.ini"));
}else{
    http_response_code(400);
}
?>