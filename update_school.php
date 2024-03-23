<?php
require_once("./frontend/sitemap.php");
if(isset($_SESSION["id"])){   //you are logged in
    if($_SESSION["permissions"] == "ADMIN"){   //you are admin ?>
        <!DOCTYPE html>
        <html lang='pl-PL'>
            <head>
                <?php require_once($module["head"]) ?>
                <script>
                    function submit(){
                        var data = {title:"",desc:"",key:"",name:"",street:"",city:"",phone:"",nip:"",email:""};
                        data.title = document.getElementById("title").value;
                        data.desc = document.getElementById("desc").value;
                        data.key = document.getElementById("keywords").value;
                        data.name = document.getElementById("name").value;
                        data.street = document.getElementById("street").value;
                        data.city = document.getElementById("city").value;
                        data.phone = document.getElementById("phone").value;
                        data.nip = document.getElementById("nip").value;
                        data.email = document.getElementById("email").value;
                        $.post(<?php echo "'".
                            $API["school"]
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
                <div id="fail" style="display: none;">
                    <strong>Fail!</strong> nie udało się zmodyfikować danych szkoły!
                </div>
                <input type="text" id='name' placeholder="Nazwa szkoły" >
                <input type="text" id='street' placeholder="Ulica" >
                <input type="text" id='city' placeholder="Miasto" >
                <input type="number" id='phone' placeholder="Telefon" >
                <input type="number" id='nip' placeholder="NIP" >
                <input type="email" id='email' placeholder="Email" >
                <input type="text" id='title' placeholder="Tytuł" >
                <input type="text" id='desc' placeholder="Opis" >
                <input type="text" id='keywords' placeholder="Słowa kluczowe" >
                <button onclick='submit()'></button>
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