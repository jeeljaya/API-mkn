<?php
// header harus json
header("Content-Type: application/json");

// tangkap method request
$smethod = $_SERVER['REQUEST_METHOD'];

// inisialisasi variable hasil
$result = array();

// pengecekan metode request
if ($smethod == 'GET') {
    // jika GET
    $result['status']['code'] = 200;
    $result['status']['description'] = 'Request Valid';

    // pengambilan data dari database
    // conf koneksi db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "makanankhas";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // periksa koneksi
    if ($conn->connect_error) {
        $result['status']['code'] = 500;
        $result['status']['description'] = 'Database Connection Error';
        echo json_encode($result);
        exit;
    }

    // ambil data
    $sql = "SELECT * FROM bahanmasak";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $queryResult = $stmt->get_result();

    // fetch all data
    $result['results'] = $queryResult->fetch_all(MYSQLI_ASSOC);
} else {
    // jika bukan GET
    $result['status']['code'] = 400;
    $result['status']['description'] = 'Request Invalid';
}

// parse ke format json
echo json_encode($result);
?>
