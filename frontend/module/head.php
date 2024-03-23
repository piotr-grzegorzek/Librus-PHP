<link rel='apple-touch-icon' sizes='180x180' href=<?php echo $img["ico_180"] ?>>
<link rel='icon' type='image/png' sizes='32x32' href=<?php echo $img["ico_32"] ?>>
<link rel='icon' type='image/png' sizes='16x16' href=<?php echo $img["ico_16"] ?>>

<link rel='stylesheet' href=<?php echo $CSS["font_awesome"] ?> integrity='sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP' crossorigin='anonymous'>
<link rel='stylesheet' href=<?php echo $CSS["bootstrap"] ?> >

<script src= <?php echo $script["jquery"] ?> ></script>
<script src= <?php echo $script["popper"] ?> ></script>
<script src= <?php echo $script["bootstrap"] ?> ></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<meta charset="UTF-8">

<title id="head_title"></title>
<meta name="description" content="" id="head_desc">
<meta name="keywords" content="" id="head_key">

<script>
    //load head metadata
    $.get( <?php echo "'".
        $API["school"]
        ."'" ?> )
    .done(function( data ) {
        data = JSON.parse(data);
        document.getElementById("head_title").innerHTML = data.title;
        document.getElementById("head_desc").innerHTML = data.desc;
        document.getElementById("head_key").innerHTML = data.key;
    });
</script>
<style>
/* kolor tła dla wszystkich stron, w przyszłości można użyć w tym pliku if(strona_url) == cos*/
body,html {
    width:100%;
    height:100%;
    margin:0;
    padding:0;
}
</style>