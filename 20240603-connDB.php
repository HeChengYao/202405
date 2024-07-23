<?php
    $servername = "localhost";
    $username = "admin";
    $password = "123456";
    $dbname = "productdb";

    //建立連線
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die("連線失敗".mysqli_connect_error());
    }

    // echo "連線成功!";
    //DESC: 遞減排序 ASC: 遞增排序
    $sql = "SELECT * FROM product ORDER BY ID DESC";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        // $row = mysqli_fetch_assoc($result);
        // echo "ID: ".$row["ID"]."產品名稱: ".$row["Pname"]."<br>";
        $mydata = array();
        while($row = mysqli_fetch_assoc($result)){
            // echo "ID: ".$row["ID"]."產品名稱: ".$row["Pname"]."<br>";
            $mydata[] = $row;
        }
        echo json_encode($mydata);
    }else{
        echo "查無資料";
    }

    mysqli_close($conn);
?>