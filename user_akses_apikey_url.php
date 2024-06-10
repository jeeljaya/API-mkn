<?php

    $key = $_GET['key'];

    // koneksi db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "makanankhas";

    //bikin koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // cek user
    $sql = "SELECT * FROM user WHERE token='$key'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "token valid";
    }else{
        echo "token not valid";
    }
?>