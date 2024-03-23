<?php
// Do bibliotek podawane linki, ponieważ zapisują się w cache po wejsciu na stronę z nimi, i wybiera najblizszy serwer
session_start();
//Images
$img = array();
$img["logo"] = "./frontend/img/logo.png";
$img["login_error"] = "./frontend/img/error.png";
$img["nav_logo"] =  "./frontend/img/ico_32x32.png";
$img["ico_180"] = "./frontend/img/ico_180x180.png";
$img["ico_32"] = "./frontend/img/ico_32x32.png";
$img["ico_16"] = "./frontend/img/ico_16x16.png";
//Pages
$page = array();
$page["login"] = "./login.php";
$page["main"] = "./main_page.php";
//CSS
$CSS = array();
$CSS["font_awesome"] = "https://use.fontawesome.com/releases/v5.6.1/css/all.css";   //ikonki
$CSS["bootstrap"] = "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css";
$CSS["login"] = "./frontend/styles/login.css";
//Scripts
$script = array();
$script["jquery"] = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js";
$script["popper"] = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js";
$script["bootstrap"] = "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js";
//Modules
$module = array();
$module["head"] = "./frontend/module/head.php";
$module["nav"] = "./frontend/module/navbar.php";
//API
$API = array();
$API["login"] = "/api/login.php";
$API["logout"] = "/api/logout.php";
$API["register"] = "/api/register.php";
$API["school"] = "/api/school.php";
function page_previous(){?>
    <script>window.history.go(-1)</script>
<?php
}?>
