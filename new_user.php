<?php
require_once("./frontend/sitemap.php");
if(isset($_SESSION["id"])){   //you are logged in
    if($_SESSION["permissions"] == "ADMIN"){   //you are admin ?>
        <!DOCTYPE html>
        <html lang="pl-PL">
            <head>
                <?php require_once($module["head"]) ?>
                <script>
                    function register(){
                        var data={login:"",pass:"",email:"",name:"",surname:"",permissions:""}
                        data.login = document.getElementById("login").value;
                        data.pass = document.getElementById("pass").value;
                        data.email = document.getElementById("email").value;
                        data.name = document.getElementById("name").value;
                        data.surname = document.getElementById("surname").value;
                        data.permissions = document.getElementById("permissions").value;
                        $.post(<?php echo "'".
                            $API["register"]
                            ."'" ?>,data)
                        .done(function() {
                            $('#fail').hide();
                        })
                        .fail(function() {
                            $('#fail').show();
                        });
                    }
                </script>
            </head>
            <body>
                <?php require_once($module["nav"]);?>
                <div class="container-fluid p-3 bg-dark text-white">
                    <div class="alert alert-danger collapse" alert-danger id="fail" alert-dismissible fade show">
                        <strong>Fail!</strong> Something went wrong!
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Login:</span>
                        </div>
                        <input type="text" placeholder="Login..." id="login" class="form-control" >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password:</span>
                        </div>
                        <input type="password" placeholder="Hasło..." id="pass" class="form-control" >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email:</span>
                        </div>
                        <input type="email" placeholder="Adres e-mail..." id="email" class="form-control" >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name:</span>
                        </div>
                        <input type="text" placeholder="Imię..." id="name" class="form-control" >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Surname:</span>
                        </div>
                        <input type="text" placeholder="Nazwisko..." id="surname" class="form-control" >
                    </div>
                    <select id="permissions" class="form-control">
                        <option value="STUDENT" selected>Uczeń</option>
                        <option value="TEACHER">Nauczyciel</option>
                        <option value="ADMIN">Administrator</option>
                    </select>
                    <button onclick="register()">Zatwierdź</button> 
                </div>   
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