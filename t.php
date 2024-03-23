<?php
require_once("./frontend/sitemap.php");
if(isset($_SESSION["id"])){   //you are logged in
    if($_SESSION["permissions"] == "ADMIN"){   //you are admin ?>
        <!DOCTYPE html>
        <html lang="pl-PL">
            <head>
                <?php require_once($module["head"]) ?>
                <style>
                
                </style>
            </head>
            <body>
              <nav class='navbar navbar-expand-sm navbar-light bg-warning'>
                <img src=<?php echo $img["nav_logo"] ?> alt='Logo' style='width:40px;border-radius: 25px;'>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>

                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav ml-auto topnav'>
                        <li class='nav-item'>
                        <li class='nav-item dropleft'>
                            <a class='nav-link dropdown-toggle' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Contact
                            </a>
                            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <p class='dropdown-item' id='nav_schl_name'></p>
                                <div class='dropdown-divider'></div>
                                <p class='dropdown-item' id='nav_schl_street'></p>
                                <p class='dropdown-item' id='nav_schl_city'></p>
                                <div class='dropdown-divider'></div>
                                <p class='dropdown-item' id='nav_schl_email'></p>
                                <p class='dropdown-item' id='nav_schl_phone'></p>
                                <p class='dropdown-item' id='nav_schl_nip'></p>
                            </div>
                        </li>
                    </ul>
                </div>
              </nav>
              <script>
                //load contact data from ini
                $.get( <?php echo "'".
                    $API["school"]
                    ."'" ?> )
                .done(function( data ) {
                    data = JSON.parse(data);
                    document.getElementById("nav_schl_name").innerHTML = data.name;
                    document.getElementById("nav_schl_street").innerHTML = data.street;
                    document.getElementById("nav_schl_city").innerHTML = data.city;
                    document.getElementById("nav_schl_email").innerHTML = data.email;
                    document.getElementById("nav_schl_phone").innerHTML = data.phone;
                    document.getElementById("nav_schl_nip").innerHTML = data.nip;
                });
              </script>
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