<?php
    echo "time(): " . time();
    echo "<BR>";
    echo "uniqid(time()): " . uniqid(time());
    echo "<BR>";
    echo "md5: " . md5("123456");
    echo "<BR>";
    echo "hash_md5: " . hash('md5', time());
    echo "<BR>";
    echo "hash_sha256: " . hash('sha256', time());
    echo "<BR>";
    echo "hash_sha512: " . hash('sha512', time());
    echo "<BR>";
    echo "產生驗證需要的UID";
    echo "<BR>";
    echo substr(hash('sha256', uniqid(time())), 0, 10) ;
    echo "<BR>";
    echo substr(hash('sha256', uniqid(time())), 0, 10).substr(hash('sha256', uniqid(time())), 10, 10);
?>