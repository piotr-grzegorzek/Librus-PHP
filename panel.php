<?php
require_once("./frontend/sitemap.php");
if(isset($_SESSION["id"])){   //you are logged in
    if($_SESSION["permissions"] == "ADMIN"){   //you are admin ?>
        <!DOCTYPE html>
        <html lang="pl-PL">
            <head>
                <?php require_once($module["head"]) ?>
            </head>
            <body>
                <?php require_once($module["nav"]);?>
            </body>
        </html>
<?php
    }
    else{   //must login 
        header("Location: ".$page["login"]);
    }
}
else{   //not admin, back to previous page 
    page_previous();
}?>
