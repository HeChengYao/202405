<?php
//input
//{"username" : "XXX", "password" : "XXX"}

//output 
// {"state":"true", "message":"登入成功"}
// {"state":"fasle", "message":"登入失敗"}
// {"state":"fasle", "message":"欄位不得為空白"}
// {"state":"fasle", "message":"欄位錯誤"}

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["username"]) && isset($mydata["password"])) {
    if ($mydata["username"] != "" && $mydata["password"] != "") {

        $p_username   = $mydata["username"];
        $p_password   = $mydata["password"];


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
        if (mysqli_num_rows($result) == 1) {
            //帳號正確(存在)
            $row = mysqli_fetch_assoc($result);
            if (password_verify($p_password, $row["Password"])) {
                //登入成功後產生UID01儲存於資料庫
                $uid01 = substr(hash('sha256', uniqid(time())), 0, 10) ;
                $sql = "UPDATE member SET UID01 = '$uid01' WHERE Username = '$p_username'";
                mysqli_query($conn, $sql);

                //重新篩選使用者資料(除了密碼)
                $sql = "SELECT ID, Username, Email, UID01, Created_at FROM  member WHERE Username = '$p_username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                echo '{"state": true , "data" : '. json_encode($row) .',"message":"登入成功"}';
            } else {
                echo '{"state": false , "message":"登入失敗"}';
            }
        } else {
            //帳號錯誤(不存在)
            echo '{"state": false, "message":"登入失敗"}';
        }

        mysqli_close($conn);
    } else {
        echo '{"state": false , "message":"欄位不得為空白"}';
    }
} else {
    echo '{"state": false , "message":"欄位錯誤"}';
}
