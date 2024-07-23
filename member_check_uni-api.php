<?php
//input {"username" : "XXX"}

//output 
// {"state": true, "message":"帳號不存在, 可以使用"}
// {"state": fasle, "message":"帳號已存在, 不可以使用"}
// {"state": fasle, "message":"欄位不得為空白"}
// {"state": fasle, "message":"欄位錯誤"}

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["username"])) {
    if ($mydata["username"] != "") {
        $p_username   = $mydata["username"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "productdb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_errno());
        }

        $sql = "SELECT * FROM  member WHERE Username = '$p_username'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            //帳號已存在, 不能註冊
            echo '{"state": false, "message":"帳號已存在, 不可以使用"}';
        }else{
            //帳號不存在, 可以註冊
            echo '{"state": true, "message":"帳號不存在, 可以使用"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state": false , "message":"欄位不得為空白"}';
    }
} else {
    echo '{"state": false , "message":"欄位錯誤"}';
}
