<?php
    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $namalengkap = $_POST['namalengkap'];
        $email = $_POST['email'];

        // koneksi db
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "makanankhas";

        // membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // cek koneksi
        if ($conn->connect_error) {
            die("Koneksi database gagal: " . $conn->connect_error);
        }

        // memasukkan data ke tabel user
        $sql = "INSERT INTO user (username, password, namalengkap, email) VALUES ('$uname', '$pwd', '$namalengkap', '$email')";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            header("Location: user_login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>User API Sign Up</title>
</head>
<body>
    <form action="signup.php" method="post" enctype="multipart/form-data">

        <label>Username</label><br>
        <input type="text" name="uname"><br><br>

        <label>Password</label><br>
        <input type="password" name="pwd"><br><br>

        <label>Nama Lengkap</label><br>
        <input type="text" name="namalengkap"><br><br>

        <label>Email</label><br>
        <input type="email" name="email"><br><br>

        <input type="submit" name="submit" value="Sign Up">

    </form>
</body>
</html>
