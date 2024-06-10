<?php
    session_start();

    if(isset($_POST['submit'])){
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
            $_SESSION['uname']=$uname;
            $_SESSION['pwd']=$pwd;
        }else{
            echo "login salah";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Generate API key / Token</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="container">
        <h2>Generate API Key / Token</h2>
        <p>Selamat Datang <?php echo $_SESSION['uname']; ?></p>

        <form action="user_generate_key.php" method="post">
            <input type="hidden" name="uname" value="<?php echo $_SESSION['uname']; ?>">
            <input type="hidden" name="pwd" value="<?php echo $_SESSION['pwd']; ?>">

            <input type="submit" name="submit" value="Generate key/Token">
        </form>
    </div>
</body>
</html>