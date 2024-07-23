<?php
if(isset($_POST["pname"]) && isset($_POST["price"]) && isset($_POST["pnum"]) && isset($_POST["premark"]) && isset($_POST["pimg"])){
    if ($_POST["pname"] != "" && $_POST["price"] != "" && $_POST["pnum"] != "" && $_POST["premark"] != "" && $_POST["pimg"] != "") {
        $p_pname    = $_POST["pname"];
        $p_price    = $_POST["price"];
        $p_pnum     = $_POST["pnum"]; 
        $p_premark  = $_POST["premark"];
        $p_pimg     = $_POST["pimg"];

        $servername = "localhost";
        $username = "admin";
        $password = "123456";
        $dbname = "productdb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤" . mysqli_connect_error());
        }

        $sql = "INSERT INTO  product(Pname, Price, Pnum, Premark, Pimg) VALUES('$p_pname', '$p_price', '$p_pnum', '$p_premark', '$p_pimg')";
        if (mysqli_query($conn, $sql)) {
            echo '新增資料成功!';
        } else {
            echo '新增資料失敗!' . $sql . '錯誤代碼' . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo '欄位不允許空白!';
    }
}else{
    echo '欄位錯誤!';
}

