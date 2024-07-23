<?php
//input
//{"ID" : "XXXX"}

//output 
// {"state":"true", "message":"更新成功"}
// {"state":"fasle", "message":"更新失敗"}
// {"state":"fasle", "message":"欄位不得為空白"}
// {"state":"fasle", "message":"欄位錯誤"}

    $data = file_get_contents("php://input", "r");
    $mydata = array();
    $mydata = json_decode($data, true);
    if(isset($mydata["ID"])){
        if($mydata["ID"] != ""){
            $p_id  = $mydata["ID"];
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "productdb";
    
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn){
                die("連線失敗".mysqli_connect_errno());
            }
            $sql = "DELETE FROM product WHERE ID = '$p_id'";
            if(mysqli_query($conn, $sql)){
                //成功
                echo '{"state":"true", "message":"刪除成功"}';
            }else{
                //失敗
                echo '{"state":"fasle", "message":"刪除失敗"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state":"fasle", "message":"欄位不得為空白"}';
        }
    }else{
        echo '{"state":"fasle", "message":"欄位錯誤"}';
    }
       
?>  