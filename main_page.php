<?php
require_once("./frontend/sitemap.php");
if(isset($_SESSION["id"])){   //you are logged in ?>
    <!DOCTYPE html>
    <html lang="pl-PL">
        <head>
            <?php require_once($module["head"]) ?>
            <script>
                function logout(){
                    $.post(<?php echo "'".
                        $API["logout"]
                        ."'" ?>)
                    .done(function() {
                        window.location.href=<?php echo "'".$page["login"]."'" ?>;
                    })
                    .fail(function() {
                        alert("logout error")
                    });
                }
            </script>
        </head>
        <body>
            <?php require_once($module["nav"]) ?>
            <button onclick="logout()">Wyloguj</button>
        </body>
    </html>
<?php
}
else{   //must login
    header("Location: ".$page["login"]);
} ?>