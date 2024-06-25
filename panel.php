<?php
require_once ("./frontend/sitemap.php");
if (isset ($_SESSION["id"])) {   //you are logged in
    if ($_SESSION["permissions"] == "ADMIN") {   //you are admin                        ?>
        <!DOCTYPE html>
        <html lang="pl-PL">

        <head>
            <?php require_once ($module["head"]) ?>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="frontend/styles/login.css">
            <link rel="stylesheet" href="frontend/styles/glob.css">
        </head>

        <body>
            <?php require_once ($module["nav"]); ?>
            <div style="position: relative; min-height: 50px;">
                <div id="messageSuccess" class="alert alert-success" role="alert" style="display:none; position: absolute; top: 0; left: 0; right: 0; z-index: 1000;"></div>
                <div id="messageError" class="alert alert-danger" role="alert" style="display:none; position: absolute; top: 0; left: 0; right: 0; z-index: 1000;"></div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form id="roomForm">
                            <div class="form-group">
                                <input type="text" class="form-control" id="roomName" placeholder="Room Name">
                            </div>
                            <button type="button" class="btn btn-primary" onclick="createRoom()">Create Room</button>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 offset-md-3" id="roomList"></div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>

                function loadRooms() {
                    $.get('api/room.php', function (data) {
                        var rooms = JSON.parse(data);
                        var roomList = $('#roomList');
                        roomList.empty();
                        rooms.forEach(function (room) {
                            roomList.append('<div class="d-flex justify-content-between align-items-center mb-3"><div>' + room.name + '</div> <div><button class="btn btn-danger" onclick="deleteRoom(' + room.id + ')">Delete</button></div></div>');
                        });
                    });
                }

                function createRoom() {
                    var roomName = $('#roomName').val();
                    $.post('api/room.php', { type: 'INSERT', name: roomName, id: 0 })
                        .done(function () {
                            $('#messageSuccess').text('Room created successfully').show().fadeOut(5000);
                            $('#messageError').hide();
                            loadRooms();
                        })
                        .fail(function () {
                            $('#messageError').text('Error creating room').show().fadeOut(5000);
                            $('#messageSuccess').hide();
                        });
                }

                function deleteRoom(id) {
                    $.post('api/room.php', { type: 'DELETE', id: id })
                        .done(function () {
                            $('#messageSuccess').text('Room deleted successfully').show().fadeOut(5000);
                            $('#messageError').hide();
                            loadRooms();
                        })
                        .fail(function () {
                            $('#messageError').text('Error deleting room').show().fadeOut(5000);
                            $('#messageSuccess').hide();
                        });
                }

                $(document).ready(function () {
                    loadRooms();
                });
            </script>
        </body>

        </html>
        <?php
    } else {   //must login 
        header("Location: " . $page["login"]);
    }
} else {   //not admin, back to previous page 
    page_previous();
} ?>