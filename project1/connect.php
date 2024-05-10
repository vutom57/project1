<?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $databaseName = 'kenhtintuc';

    $conn = mysqli_connect($hostName, $userName, $passWord, $databaseName);
    if (!$conn) {
        exit('Kết nối không thành công!');
    }
    ?>