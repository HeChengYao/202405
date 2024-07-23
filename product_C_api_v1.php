<?php
//input
//{"pname" : "可樂", "price" : "90", "pnum" : "10", "premark" : "產品備註", "pimg" : "圖片路徑"}

//output 
//{"state":"true", "message":"新增成功"}
// {"state":"fasle", "message":"新增失敗"}
// {"state":"fasle", "message":"欄位不得為空白"}
// {"state":"fasle", "message":"欄位錯誤"}

    $data = file_get_contents("php://input", "r");
    $mydata = array();
    $mydata = json_decode($data, true);

    if(isset($mydata["pname"]) && isset($mydata["price"]) && isset($mydata["pnum"]) && isset($mydata["premark"]) && isset($mydata["pimg"])){
        if($mydata["pname"] != "" && $mydata["price"] != "" && $mydata["pnum"] != "" && $mydata["premark"] != "" && $mydata["pimg"] != ""){
            $p_pname   = $mydata["pname"];
            $p_price   = $mydata["price"];
            $p_pnum    = $mydata["pnum"];
            $p_premark = $mydata["premark"];
            $p_pimg    = $mydata["pimg"];
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "productdb";
    
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if(!$conn){
                die("連線失敗".mysqli_connect_errno());
            }
            $sql = "INSERT INTO product(Pname, Price, Pnum, Premark, Pimg) VALUES('$p_pname', '$p_price', '$p_pnum', '$p_premark', '$p_pimg')";
            if(mysqli_query($conn, $sql)){
                //成功
                echo '{"state":"true", "message":"新增成功"}';
            }else{
                //失敗
                echo '{"state":"fasle", "message":"新增失敗"}';
            }
            mysqli_close($conn);
        }else{
            echo '{"state":"fasle", "message":"欄位不得為空白"}';
        }
    }else{
        echo '{"state":"fasle", "message":"欄位錯誤"}';
    }
       
?>  