<?php
    //時間戳記
    date_default_timezone_set('UTC');
    echo time();
    echo "<BR>";
    echo date("Y-m-d-h:i:s");
    echo "<BR>";
    //密碼加密
    echo password_hash("123456", PASSWORD_DEFAULT);

    $hash_str = '$2y$10$jAdzWojaeGZHLbH9xqeNQuZyt0CGBCebO6lUJdqCxCxx4LTMdaGXK';
    echo "<BR>";
    if(password_verify("123456", $hash_str)){
        echo "密碼正確!";
    }else{
        echo "密碼錯誤!";
    }
?>