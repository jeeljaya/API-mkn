<?php

    // header hasil berbentuk json
    header("Content-Type:application/json");

    // tangkap key
    $header = apache_request_headers();
    $key = $header['key'];

    // tangkap metode akses
    $method = $_SERVER['REQUEST_METHOD'];

    // variabel hasil
    $result = array();

    // S:koneksi database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "makanankhas";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // E:koneksi database

    // cek user
    $sql = "SELECT * FROM user WHERE key_token='$key'";
    $user = $conn->query($sql);

    if ($user->num_rows > 0) {
            // user valid
            // cek metode
        if($method=='GET'){

            // pengecekan parameter
            if(isset($_GET['id'])){
                // tangkap parameter
                $id = $_GET['id'];

                // jika metode sesuai
                $result['status'] = [
                    "code" => 200,
                    "description" => 'Request Valid'
                ];

                // buat query
                $sql = "SELECT * FROM bahanmasak WHERE id ='$id'";
                // eksekusi query
                $hasil_query = $conn->query($sql);
                // masukkan ke array result
                $result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);
            }else{
                $result['status'] = [
                    "code" => 400,
                    "description" => 'Parameter Invalid'
                ];
            }
        
        }else{
            $result['status'] = [
                "code" => 400,
                "description" => 'Request Not Valid'
            ];
        }
    }else{
        $result['status'] = [
            "code" => 400,
            "description" => 'API Key/Token Not Valid'
        ];
    }

    // tampilkan data dalam format json
    echo json_encode($result);

?>