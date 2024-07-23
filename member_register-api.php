<?php
//input
//{"username" : "XXX", "password" : "XXX", "email" : "XXX"}

//output 
// {"state":"true", "message":"註冊成功"}
// {"state":"fasle", "message":"註冊失敗"}
// {"state":"fasle", "message":"欄位不得為空白"}
// {"state":"fasle", "message":"欄位錯誤"}

    $data = file_get_contents("php://input", "r");
    $mydata = array();
    $mydata = json_decode($data, true);

    if(isset($mydata["username"]) && isset($mydata["password"]) && isset($mydata["email"])){
        if($mydata["username"] != "" && $mydata["password"] != "" && $mydata["email"] != ""){
            
            $p_username   = $mydata["username"];
            $p_password   = password_hash($mydata["password"], PASSWORD_DEFAULT);
            $p_email   = $mydata["email"];

            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "productdb";
    
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn){
                die("連線失敗".mysqli_connect_errno());
            }
            $sql = "INSERT INTO  member(Username, Password, Email) VALUES('$p_username', '$p_password', '$p_email')";
            if(mysqli_query($conn, $sql)){
                //成功
                echo '{"state":"true", "message":"註冊成功"}';
            }else{
                //失敗
                echo '{"state":"fasle", "message":"註冊失敗"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state":"fasle", "message":"欄位不得為空白"}';
        }
    }else{
        echo '{"state":"fasle", "message":"欄位錯誤"}';
    }
       
?>  