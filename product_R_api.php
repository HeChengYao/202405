<?php

//output 
// {"state":"true", "data" : "資料" ,"message":"讀取成功"}
// {"state":"fasle", "message":"讀取失敗"}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "productdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("連線失敗".mysqli_connect_errno());
    }
    //ASC : 遞增       DESC : 遞減
    $sql = "SELECT * FROM product ORDER BY ID DESC";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $mydata = array();
        while($row = mysqli_fetch_assoc($result)){
            $mydata[] = $row;
        }
        // echo json_encode($mydata);
        echo '{"state":"true", "data" : '.json_encode($mydata).' ,"message":"讀取成功"}';
    }else{
        echo '{"state":"fasle", "message":"讀取失敗"}';
    }

    mysqli_close($conn);
       
?>  