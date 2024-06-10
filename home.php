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
    } else {
        echo "login salah";
    }
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: home.php"); // Redirect kembali ke halaman home.php setelah logout
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api Makanan Khas Sulawesi Selatan</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style7.css">

</head>
<body>

<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
    <a href="home.php#home">home</a>
    <a href="#about">about</a>
    <a href="dokumentasi.php#dokumentasi">dokumentasi</a>
        <?php
        if (isset($_SESSION['uname'])) {
            echo '<a href="key.php">API Key</a>';
            echo '<a href="user_login.php" name="logout">logout</a>';
        } else {
            echo '<a href="user_login.php">login</a>';
        }
        ?>
        
    </nav>
</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Api Makanan Khas SulSel</h3>
        <p>Api Makan Khas Sulsel memiliki API yang dapat Anda manfaatkan untuk mengambil data makanan khas dari daerah-daerah yang berada pada provinsi sulawesi selatan</p>
        <p></p>
        <?php
        if (isset($_SESSION['uname'])) {
            // Jika pengguna sudah login, tombol "get yours now" diarahkan ke halaman dokumentasi.php
            echo '<a href="dokumentasi.php" class="btn">get yours now</a>';
        } else {
            // Jika pengguna belum login, tombol "get yours now" diarahkan ke halaman user_login.php
            echo '<a href="user_login.php" class="btn">get yours now</a>';
        }
        ?>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->
<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="images/about.jpg" alt="">
        </div>

        <div class="content">
            <h3>Tentang Api Makanan Khas Sulsel</h3>
            <p>Api Makanan khas Sulsel merupakan sebuah situs dan web service (API) yang menyediakan informasi mengenai makanan khas dari berbagai daerah di Sulawesi Selatan.

Keunikan dari sistem api makanan khas sulsel adalah data yang terpadu. yang dimana tinggal memasukan nama daerah dan dia akan menampilkan daftar makanan khas daerah tersebut dan juga menampilkan deskripsi, nama makana, dan gambar dari makana khas daerah tersebut</p>
        </div>

    </div>

</section>

<!-- about section ends -->


<!-- footer section starts  -->

<section class="footer">

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="https://l.instagram.com/?u=https%3A%2F%2Finstagram.com%2Fit_reveny1%2F&e=AT03mWeRi9q7jf1MP6TMCPyl9BgnR4AsF489LdbZqz_kTE-xRsH-2ONTnk998GCdm_bE_iBZBDh1p1siArxmSkqewWRVdZU_B1avEV8" class="fab fa-instagram"></a>
    </div>


</section>

<!-- footer section ends -->

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
