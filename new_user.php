<?php
require_once ("./frontend/sitemap.php");
if (isset ($_SESSION["id"])) {   //you are logged in
    if ($_SESSION["permissions"] == "ADMIN") {   //you are admin  ?>
        <!DOCTYPE html>
        <html lang="pl-PL">

        <head>
            <?php require_once ($module["head"]) ?>
            <link rel="stylesheet" href="frontend/styles/glob.css">
            <script>
            function register() {
                var data = {
                    login: document.getElementById('login').value,
                    pass: document.getElementById('pass').value,
                    email: document.getElementById('email').value,
                    name: document.getElementById('name').value,
                    surname: document.getElementById('surname').value,
                    permissions: document.getElementById('permissions').value
                };

                fetch(<?php echo "'" . $API["register"] . "'" ?>, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams(data)
                })
                .then(response => {
                    if (response.ok) {
                        document.getElementById('registrationSuccess').style.display = 'block';
                        document.getElementById('registrationError').style.display = 'none';
                        // Optionally, redirect or update the UI here
                    } else if (response.status === 400) {
                        document.getElementById('registrationError').textContent = 'Please fill in all the fields correctly.';
                        document.getElementById('registrationError').style.display = 'block';
                    } else if (response.status === 401) {
                        document.getElementById('registrationError').textContent = 'Unauthorized. You must be an admin to register a new user.';
                        document.getElementById('registrationError').style.display = 'block';
                    } else {
                        throw new Error('Something went wrong');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('registrationError').textContent = 'Registration failed. Please try again.';
                    document.getElementById('registrationError').style.display = 'block';
                });
            }
            </script>
        </head>

        <body>
            <?php require_once ($module["nav"]); ?>
            <div class="form-container">
                <div class="container-fluid p-3 bg-dark text-white">
                    <div style="position: relative; min-height: 50px;">
                        <div id="registrationSuccess" class="alert alert-success" style="display:none;">
                            Registration successful!
                        </div>

                        <!-- Error Message Placeholder -->
                        <div id="registrationError" class="alert alert-danger" style="display:none;">
                            Registration failed. Please try again.
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Login:</span>
                        </div>
                        <input type="text" placeholder="Login..." id="login" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password:</span>
                        </div>
                        <input type="password" placeholder="Hasło..." id="pass" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email:</span>
                        </div>
                        <input type="email" placeholder="Adres e-mail..." id="email" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name:</span>
                        </div>
                        <input type="text" placeholder="Imię..." id="name" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Surname:</span>
                        </div>
                        <input type="text" placeholder="Nazwisko..." id="surname" class="form-control">
                    </div>
                    <select id="permissions" class="form-control">
                        <option value="STUDENT" selected>Uczeń</option>
                        <option value="TEACHER">Nauczyciel</option>
                        <option value="ADMIN">Administrator</option>
                    </select>
                    <button class="submit-button" onclick="register()">Zatwierdź</button>
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