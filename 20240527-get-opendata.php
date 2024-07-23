<?php
    header("Access-Control-Allow-Origin: *");
    $mydata = file_get_contents('https://media.taiwan.net.tw/XMLReleaseALL_public/hotel_C_f.json');
    echo $mydata;
?>