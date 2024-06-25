<?php
require_once ("./frontend/sitemap.php");
if (isset ($_SESSION["id"])) {   //you are logged in
    if ($_SESSION["permissions"] == "ADMIN") {   //you are admin    ?>
        <!DOCTYPE html>
        <html lang='pl-PL'>

        <head>
            <?php require_once ($module["head"]) ?>
            <link rel="stylesheet" href="frontend/styles/glob.css">
            <script>
            function submit() {
                var data = { title: "", desc: "", key: "", name: "", street: "", city: "", phone: "", nip: "", email: "" };
                data.title = document.getElementById("title").value;
                data.desc = document.getElementById("desc").value;
                data.key = document.getElementById("keywords").value;
                data.name = document.getElementById("name").value;
                data.street = document.getElementById("street").value;
                data.city = document.getElementById("city").value;
                data.phone = document.getElementById("phone").value;
                data.nip = document.getElementById("nip").value;
                data.email = document.getElementById("email").value;
                $.post(<?php echo "'" . $API["school"] . "'" ?>, data)
                    .done(function () {
                        $('#fail').hide();
                        $('#success').show().delay(5000).fadeOut();
                    })
                    .fail(function () {
                        $('#success').hide();
                        $('#fail').show();
                    });
            }
        </script>
        </head>

        <body>
            <?php require_once ($module["nav"]); ?>
            <div class="form-container">
                <div class="container-fluid p-3 bg-dark text-white">
                    <div style="position: relative; min-height: 50px;">
                        <div class="alert alert-danger collapse" alert-danger id="fail" alert-dismissible fade show">
                            <strong>Fail!</strong> Something went wrong!
                        </div>
                        <div class="alert alert-success collapse" id="success" alert-dismissible fade show">
                            <strong>Success!</strong> Update was successful!
                        </div>
                    </div>
                    <input type="text" id='name' class="form-control" placeholder="Nazwa szkoły">
                    <input type="text" id='street' class="form-control" placeholder="Ulica">
                    <input type="text" id='city' class="form-control" placeholder="Miasto">
                    <input type="number" id='phone' class="form-control" placeholder="Telefon">
                    <input type="number" id='nip' class="form-control" placeholder="NIP">
                    <input type="email" id='email' class="form-control" placeholder="Email">
                    <input type="text" id='title' class="form-control" placeholder="Tytuł">
                    <input type="text" id='desc' class="form-control" placeholder="Opis">
                    <input type="text" id='keywords' class="form-control" placeholder="Słowa kluczowe">
                    <button class="submit-button" onclick='submit()'>Zatwierdź</button>
                </div>
            </div>
        </body>

        </html>
        <?php
    } else {   //must login
        header("Location: " . $page["login"]);
    }
} else {   //not admin, back to previous page 
    page_previous();
} ?>