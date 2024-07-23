<?php
//input
//{"uid01" : "XXX"}

//output 
// {"state": true, "message":"UID合法, 可以使用, 已登入"}
// {"state": fasle, "message":"UID不合法, 不可以使用, 請重新登入"}
// {"state": fasle, "message":"欄位不得為空白"}
// {"state": fasle, "message":"欄位錯誤"}

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata["uid01"])) {
    if ($mydata["uid01"] != "") {
        $p_uid01   = $mydata["uid01"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "productdb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線失敗" . mysqli_connect_errno());
        }

        $sql = "SELECT * FROM  member WHERE UID01 = '$p_uid01'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            //UID合法, 可以使用, 已登入

            $sql = "SELECT ID, Username, Email, UID01, Created_at FROM  member WHERE UID01 = '$p_uid01'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);


            echo '{"state": true, "data" : '. json_encode($row) .', "message":"UID合法, 可以使用, 已登入"}';
        } else {
            //UID不合法, 不可以使用, 請重新登入
            echo '{"state": false, "message":"UID不合法, 不可以使用, 請重新登入"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state": false , "message":"欄位不得為空白"}';
    }
} else {
    echo '{"state": false , "message":"欄位錯誤"}';
}
