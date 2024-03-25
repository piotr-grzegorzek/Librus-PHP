<?php
require_once ("./frontend/sitemap.php");
if (isset ($_SESSION["id"])) {   //you are logged in     ?>
    <!DOCTYPE html>
    <html lang="pl-PL">

    <head>
        <?php require_once ($module["head"]) ?>
        <link rel="stylesheet" href="frontend/styles/glob.css">
        <link rel="stylesheet" href="frontend/styles/login.css">
    </head>

    <body>
        <?php require_once ($module["nav"]) ?>
    </body>
    <div id="roomList" class="room-container"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $.get('api/room.php', function (data) {
            var rooms = JSON.parse(data);
            var roomList = $('#roomList');
            rooms.forEach(function (room) {
                roomList.append('<div class="room-card"><h3>' + room.name + '</h3></div>');
            });
        });
    </script>

    </html>
    <?php
} else {   //must login
    header("Location: " . $page["login"]);
} ?>