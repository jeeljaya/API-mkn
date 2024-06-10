<?php
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];

$token = md5($uname . $pwd);

// koneksi db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "makanankhas";

//bikin koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek user
$sql = "UPDATE user SET key_token='$token' WHERE username='$uname' AND password='$pwd'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generate API Key / Token</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="container">
        <h2>Your API Key / Token</h2>
        <p id="token"><?php echo $token; ?></p>
        <button onclick="redirectToHome()">Go to Home</button>
    </div>

    <script>
        function redirectToHome() {
            window.location.href = "home.php";
        }
    </script>
</body>
</html>
