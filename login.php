<?php
require_once("./frontend/sitemap.php");
if( !(isset($_SESSION["id"])) ){  //you are logged out ?>
    <!DOCTYPE html>
    <html lang="pl-PL">
        <head>
            <?php require_once($module["head"]) ?>
            <link rel='stylesheet' href=<?php echo "'".$CSS["login"]."'" ?> >
            <script>
                function logn(){
                    var data={login:"",pass:""};
                    data.login = document.getElementById("login").value;
                    data.pass = document.getElementById("password").value;

                    $.post(<?php echo "'".
                        $API["login"]
                        ."'" ?>,data)
                    .done(function(data) {
                        $(".error").css('visibility', 'hidden');
                        window.location.href=<?php echo "'".$page["main"]."'" ?>;
                    })
                    .fail(function() {
                        $(".error").css('visibility', 'visible');
                    });
                }
            </script>
        </head>
        <body>
            <?php require_once($module["nav"]);?>
            <div class="container-fluid">

                <div class="d-flex justify-content-center modal-dialog-centered">
                    <div class="user_card mode">
                        <div class="d-flex justify-content-center">
                            <div class="brand_logo_container">
                                <img src=<?php echo $img["logo"];?> class="brand_logo" alt="Logo">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center form_container">
                            <form>
                                <div class="text-danger error mb-4"style="visibility:hidden">
                                    <strong>Wprowadź poprawne dane</strong>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="login" class="form-control input_user" value="" placeholder="Nazwa użytkownika">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" id="password" class="form-control input_pass" value="" placeholder="Hasło">
                                </div>
                                <div class="d-flex justify-content-center login_btn_container mt-5">
                                    <a class=" btn login_btn" onclick="logn()"><span>ZALOGUJ</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </body>
    </html>
<?php
}
else{   // already logged in, back to previous page
    page_previous();
}?>