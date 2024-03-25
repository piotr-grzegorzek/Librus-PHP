<style>
    body {
        overflow-y: hidden;
    }
</style>
<script>
    function logout() {
        $.post(<?php echo "'" .
            $API["logout"]
            . "'" ?>)
            .done(function () {
                window.location.href = <?php echo "'" . $page["login"] . "'" ?>;
            })
            .fail(function () {
                alert("logout error")
            });
    }
</script>
<nav class='navbar navbar-expand-lg navbar-light bg-primary bg-gradient'>
    <img src=<?php echo $img["nav_logo"] ?> alt='Logo' style='width:40px;border-radius: 25px;'>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
        aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>

    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav ml-auto topnav'>
            <?php if (isset ($_SESSION['id'])): ?>
                <li class='nav-item'>
                    <a class='nav-link' href='main_page.php'>Main Page</a>
                </li>
            <?php endif; ?>

            <?php if (isset ($_SESSION["permissions"]) && $_SESSION["permissions"] == "ADMIN"): ?>
                <li class='nav-item'>
                    <a class='nav-link' href='new_user.php'>Add New User</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='panel.php'>Manage Rooms</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='update_school.php'>Update School</a>
                </li>
            <?php endif; ?>

            <?php if (isset ($_SESSION['id'])): ?>
                <li class='nav-item'>
                    <a class='nav-link' href='' onclick="logout()">Logout</a>
                </li>
            <?php endif; ?>
            <li class='nav-item dropleft'>
                <a href='' class='nav-link dropdown-toggle' id='navbarDropdown' role='button' data-toggle='dropdown'
                    aria-haspopup='true' aria-expanded='false'>
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
    $.get(<?php echo "'" .
        $API["school"]
        . "'" ?> )
        .done(function (data) {
            data = JSON.parse(data);
            document.getElementById("nav_schl_name").innerHTML = data.name;
            document.getElementById("nav_schl_street").innerHTML = data.street;
            document.getElementById("nav_schl_city").innerHTML = data.city;
            document.getElementById("nav_schl_email").innerHTML = data.email;
            document.getElementById("nav_schl_phone").innerHTML = data.phone;
            document.getElementById("nav_schl_nip").innerHTML = data.nip;
        });
</script>