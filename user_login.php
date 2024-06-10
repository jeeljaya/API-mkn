<?php
session_start();

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    // koneksi db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "makanankhas";

    //bikin koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // cek user
    $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['uname'] = $uname;
        $_SESSION['pwd'] = $pwd;
        header("Location: key.php"); // Redirect ke halaman user_generate_key.php setelah berhasil login
        exit();
    } else {
        $error_message = "Gagal login. Silakan cek kembali username dan password Anda.";
    }
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: home.php"); // Redirect kembali ke halaman home.php
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User API Login</title>
    <link rel="stylesheet" type="text/css" href="css/style4.css">
</head>
<body>
    <div class="container">
        <h1>User API Login</h1>
        <?php
        // Cek apakah pengguna sudah login atau belum
        if (isset($_SESSION['uname']) && isset($_SESSION['pwd'])) {
            echo '<form action="user_login.php" method="post" enctype="multipart/form-data">
                    <input type="submit" name="logout" value="Log Out">
                </form>';
        } else {
            echo '<form action="user_login.php" method="post" enctype="multipart/form-data">
                    <label for="uname">Username</label><br>
                    <input type="text" id="uname" name="uname"><br><br>
        
                    <label for="pwd">Password</label><br>
                    <input type="password" id="pwd" name="pwd"><br><br>
        
                    <input type="submit" name="submit" value="Log In">
                </form>';

            // Tampilkan pesan error jika login gagal
            if (isset($error_message)) {
                echo '<p style="color: red;">' . $error_message . '</p>';
            }
        }
        ?>
    
        <p>Belum punya akun? Silakan daftar.</p>
        <a href="user_signup.php"><button class="signup-button">Sign Up</button></a>
    </div>
</body>
</html>
