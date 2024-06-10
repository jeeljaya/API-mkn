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
<html>
<head>
  <title>Dokumentasi API</title>
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
<header class="header">

<a href="#" class="logo">
    <img src="images/logo.png" alt="">
</a>

<nav class="navbar">
    <a href="home.php#home">home</a>
    <a href="home.php#about">about</a>
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
  <header>
    <h1>Dokumentasi API</h1>
  </header>
  
  <div class="sidebar">
  </div>
  
  <!-- Product Section -->
  <section class="products" id="products">
    <div class="container">
      <h2 class="text-center mb-4">API MAKANAN KHAS SULAWESI SELATAN</h2>
      <div class="row justify-content-center">
        <div class="col-sm-3">
          <div class="list-group list-group-flush ">
            <a href="#section1" class="list-group-item list-group-item-dark fw-bold" style="background-color: #1a1a1a; color: #fff; font-size: 15px; padding: 8px;">MAKANAN</a>
            <a href="#section2" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;" >Endpoint Get All<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section3" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;">Parameter MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section4" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px padding-left: 30px;">Contoh Request MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section5" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px padding-left: 30px;">Contoh Response MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>

            <a href="#section6" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;" >Endpoint Get One<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section7" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;">Parameter MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section8" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;">Contoh Request MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section9" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;" >Contoh Response MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>

            <a href="#section10" class="list-group-item list-group-item-dark fw-bold" style="background-color: #1a1a1a; color: #fff; font-size: 15px; padding: 8px;">RESEP MAKANAN</a>
            <a href="#section11" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Endpoint Get All<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section12" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;" >Parameter MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section13" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;" >Contoh Request MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section14" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;">Contoh Response MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>

            <a href="#section15" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Endpoint Get One<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section16" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;" >Parameter RESEP MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section17" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;" >Contoh Request RESEP MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
            <a href="#section18" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background-color:  #666; color: #fff; font-size: 12px; padding-left: 30px;" >Contoh Response RESEP MAKANAN<i class="pull-right fas fa-solid fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="col-sm-9">
            <div id="section1">
              <h4 class="fw-bold">MAKANAN</h4>
              <p>Pada bagian makanan terdapat beberapa data yang diperoleh oleh user yaitu nama, deskripsi gambar dari makanan khas Sulawesi Selatan</p>
            </div>
            <div id="section2">
              <h4>Endpoint Get All</h4>
              <ul class="list-group">
                <li class="list-group-item list-group-item-dark" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Endpoint</code></pre></li>
                <li class="list-group-item list-group-item-secondary" style="background-color: #333333; color: #fff"><pre><code>http://localhost/apimkn/getallmkn.php</code></pre></li>
              </ul>
            </div>
            <br>
            <div id="section3">
              <h4>Parameter MAKANAN</h4>
              <table class="table table table-hover">
                <thead>
                  <tr style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">
                    <th>Method</th>
                    <th>Parameter</th>
                    <th>Type</th>
                    <th>Require</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody class="table table-hover" style="background-color: #333333; color: #fff">
                  <tr>
                    <td>GET/HEAD</td>
                    <td>Key</td>
                    <td>String</td>
                    <td>Required</td>
                    <td>API Key</td>
                  </tr>
                  <tr>
                    <td>GET</td>
                    <td>Id</td>
                    <td>String</td>
                    <td>Optional</td>
                    <td>Id MAKANAN</td>
                  </tr>
                </tbody>
            </table>
            </div>
            <div id="section4">
              <h4>Contoh Request MAKANAN</h4>
              <div class="card">
                <div class="card-header" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Request</div>
                <div class="card-body"style="background-color: #333333; color: #fff;"><pre><code>&lt;
  ?php

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/apimkn/getallmkn.php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "key: your-api-key"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }

&gt;</code></pre>
                </div>
              </div>
            </div>
            <div id="section5">
              <h4>Contoh Response MAKANAN</h4>
              <div class="card">
                <div class="card-header" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Response</div>
                <div class="card-body"style="background-color: #333333; color: #fff;"><pre><code>
{
    "status": {
        "code": 200,
        "description": "Request Valid"
    },
    "results": [
        {
            "id": 157,
            "nama": "Pallubasa",
            "deskripsi": "Kuliner yang bisa kamu temui saat jalan-jalan di Maros adalah pallubasa. Sajian ini merupakan makanan tradisional yang berasal dari Sulawesi Selatan. Nama pallubasa berasal dari bahasa Makassar, yakni pallu yang artinya makanan serta basa yang artinya bas",
            "gambar": "https://drive.google.com/file/d/1QORz6KpFIvIWcu7sgO1n9UsZf6_5WvDQ/view?usp=drive_link"
        },
        {
            "id": 158,
            "nama": "Roti Maros",
            "deskripsi": "Bentuk roti maros berupa potongan kotak yang kalau dilihat mirip seperti roti sobek ataupun roti kasur. Ini merupakan makanan buatan Maros asli yang banyak penggemarnya. Dahulu, roti maros adalah makanan masyarakat kelas menengah ke bawah. Penampilan roti",
            "gambar": "https://drive.google.com/file/d/1sJDkmYKDow8PSvCulbjBdfFkQ0DCRcHi/view?usp=drive_link"
        }
    ]
}
</pre></code>
                </div>
              </div>
            </div>
            <div id="section6">
              <h4>Endpoint Get One</h4>
              <ul class="list-group">
                <li class="list-group-item list-group-item-dark" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Endpoint</code></pre></li>
                <li class="list-group-item list-group-item-secondary" style="background-color: #333333; color: #fff"><pre><code>http://localhost/apimkn/getonemkn.php?id=157</code></pre></li>
              </ul>
            </div>
            <br>
            <div id="section7">
              <h4>Parameter MAKANAN</h4>
              <table class="table table table-hover">
                <thead>
                  <tr style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">
                    <th>Method</th>
                    <th>Parameter</th>
                    <th>Type</th>
                    <th>Require</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody class="table table-hover" style="background-color: #333333; color: #fff">
                  <tr>
                    <td>GET/HEAD</td>
                    <td>Key</td>
                    <td>String</td>
                    <td>Required</td>
                    <td>API Key</td>
                  </tr>
                  <tr>
                    <td>GET</td>
                    <td>Id</td>
                    <td>String</td>
                    <td>Optional</td>
                    <td>Id MAKANAN</td>
                  </tr>
                </tbody>
            </table>
            </div>
            <div id="section8">
              <h4>Contoh Request MAKANAN</h4>
              <div class="card">
                <div class="card-header" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Request</div>
                <div class="card-body"style="background-color: #333333; color: #fff;"><pre><code>&lt;
?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/apimkn/getonemkn.php?id=157",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: your-api-key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?&gt;</code></pre>
                </div>
              </div>
            </div>
            <div id="section9">
              <h4>Contoh Response MAKANAN</h4>
              <div class="card">
                <div class="card-header" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Response</div>
                <div class="card-body"style="background-color: #333333; color: #fff;"><pre><code>
                {
    "status": {
        "code": 200,
        "description": "Request Valid"
    },
    "results": [
        {
            "id": "157",
            "nama": "Pallubasa",
            "deskripsi": "Kuliner yang bisa kamu temui saat jalan-jalan di Maros adalah pallubasa. Sajian ini merupakan makanan tradisional yang berasal dari Sulawesi Selatan. Nama pallubasa berasal dari bahasa Makassar, yakni pallu yang artinya makanan serta basa yang artinya bas",
            "gambar": "https://drive.google.com/file/d/1QORz6KpFIvIWcu7sgO1n9UsZf6_5WvDQ/view?usp=drive_link"
        }
    ]
}
</pre></code>
                </div>
              </div>
            </div>
            <div id="section10">
              <h4 class="fw-bold">RESEP MAKANAN</h4>
              <p>Pada bagian resep makanan terdapat beberapa data yang diperoleh oleh user yaitu nama, bahan dan cara masak dari makanan khas Sulawesi Selatan</p>
            </div>
            <div id="section11">
              <h4>Endpoint Get All</h4>
              <ul class="list-group">
                <li class="list-group-item list-group-item-dark" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Endpoint</code></pre></li>
                <li class="list-group-item list-group-item-secondary" style="background-color: #333333; color: #fff"><pre><code>http://localhost/apimkn/getallmkn1.php</code></pre></li>
              </ul>
            </div>
            <br>
            <div id="section12">
              <h4>Parameter RESEP MAKANAN</h4>
              <table class="table table table-hover">
                <thead>
                  <tr style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">
                    <th>Method</th>
                    <th>Parameter</th>
                    <th>Type</th>
                    <th>Require</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody class="table table-hover" style="background-color: #333333; color: #fff">
                  <tr>
                    <td>GET/HEAD</td>
                    <td>Key</td>
                    <td>String</td>
                    <td>Required</td>
                    <td>API Key</td>
                  </tr>
                  <tr>
                    <td>GET</td>
                    <td>Id</td>
                    <td>String</td>
                    <td>Optional</td>
                    <td>Id MAKANAN</td>
                  </tr>
                </tbody>
            </table>
            </div>
            <div id="section13">
              <h4>Contoh Request RESEP MAKANAN</h4>
              <div class="card">
                <div class="card-header" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Request</div>
                <div class="card-body"style="background-color: #333333; color: #fff;"><pre><code>&lt;
?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/apimkn/getallmkn1.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: your-api-key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?&gt;</code></pre>
                </div>
              </div>
            </div>
            <div id="section14">
              <h4>Contoh Response RESEP MAKANAN</h4>
              <div class="card">
                <div class="card-header" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Response</div>
                <div class="card-body"style="background-color: #333333; color: #fff;"><pre><code>
{
    "status": {
        "code": 200,
        "description": "Request Valid"
    },
    "results": [
        {
            "id": 1,
            "nama": "Pallubasa",
            "bahan": "150 gram daging sapi 150 gram jantung sapi150 gram babat 150 gram hati sapi150 gram limpa150 gram usus sapiMinyak goreng bakal menumis secukupnya",
            "cara_masak": "Sebelumnya rebus dahulu daging sapi dan jeroan dalam tempat berbeda atau terpisah sampai keduanya empuk dan matang. Ambil air kaldunya. Berlanjut potong-potong daging dan jerohan sesuai selera. Sisihkan.Selanjutnya panaskan minyak goreng bakal menumis bumbu halus bersama serai, lengkuas, cengkih, kayu manis, dan juga gula merah hingga beraroma harum dan matang.Kemudian masukkan daging dan jerohan sapi sambil diaduk rata.Tambahkan air kaldu sapi, masak menggunakan api kecil sampai masakan mendidih. Tambahkan air asam dan kelapa sangrai. Aduk kembali dan masak hingga bumbu meresap dan kuah kental. Angkat dan sajikan. Dan berikan taburan daun bawang plus bawang goreng.Sajikan."
        },
        {
            "id": 2,
            "nama": "Roti Maros",
            "bahan": "500 gr terigu 100 gr gula halus11 gr ragi instan2 butir kuning telur 40 gr margarin 50 gr air (kurang lebih dan masukkan air sedikit demi sedikit)200 gr gula merah200 ml air1 kara kemasan kecil + air hingga 150 ml1 telur4 sdm terigu 3 sdm gula pasir (tambahkan sesuai selera kalau dirasa kurang manis)seujung sendok garamsecubit vanili",
            "cara_masak": "Buat isinya terlebih dulu.. rebus gula merah dg air lalu saring. Tuang lagi ke panci. Di wadah lain, campurkan kara, air, telur, garam, vanili dan terigu aduk rata masukkan ke air gula merah masak sampai mendidih sambil terus diaduk. Aduk terus biarkan mendidih beberapa saat supaya benar2 tanak.  Kemudian buat rotinya.. campurkan semua bahan kecuali margarin. Uleni sampai tercampur. Tambahkan margarin. Uleni lagi sampai kalis. Saya lanjutkan pakai mixer kaki spiral 5menit sj sampai kalis elastis. Istirahatkan adonan hingga mengembang 2x lipat. Poles talam dengan margarin, bentuk roti sesuai selera. Roti maros biasanya dibentuk seperti roti kasur. Biarkan mengembang 2x lipat.  Dan panggang hinggga matang. Sudah matang keluarkan dr cetakan poles margarin atasnya selagi panas. Biarkan dingin  Belah roti lalu beri isi selai kaya gula merah. Kemudian ditutup kembali."
        },
   
            "id": 3,
            "nama": "Pallubasa",
            "bahan": "150 gram daging sapi 150 gram jantung sapi 150 gram babat 150 gram hati sapi 150 gram limpa 150 gram usus sapi Minyak goreng bakal menumis secukupnya",
            "cara_masak": "Sebelumnya rebus dahulu daging sapi dan jeroan dalam tempat berbeda atau terpisah sampai keduanya empuk dan matang. Ambil air kaldunya. Berlanjut potong-potong daging dan jerohan sesuai selera. Sisihkan.Selanjutnya panaskan minyak goreng bakal menumis bumbu halus bersama serai, lengkuas, cengkih, kayu manis, dan juga gula merah hingga beraroma harum dan matang. Kemudian masukkan daging dan jerohan sapi sambil diaduk rata.Tambahkan air kaldu sapi, masak menggunakan api kecil sampai masakan mendidih. Tambahkan air asam dan kelapa sangrai. Aduk kembali dan masak hingga bumbu meresap dan kuah kental. Angkat dan sajikan. Dan berikan taburan daun bawang plus bawang goreng. Sajikan."
        }
    ]
}
</pre></code>
                </div>
              </ 
            </div>
            <div id="section15">
              <h4>Endpoint Get One</h4>
              <ul class="list-group">
                <li class="list-group-item list-group-item-dark" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Endpoint</code></pre></li>
                <li class="list-group-item list-group-item-secondary" style="background-color: #333333; color: #fff"><pre><code>http://localhost/apimkn/getonemkn1.php?id=2</code></pre></li>
              </ul>
            </div>
            <br>
            <div id="section16">
              <h4>Parameter Resep MAKANAN</h4>
              <table class="table table table-hover">
                <thead>
                  <tr style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">
                    <th>Method</th>
                    <th>Parameter</th>
                    <th>Type</th>
                    <th>Require</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody class="table table-hover" style="background-color: #333333; color: #fff">
                  <tr>
                    <td>GET/HEAD</td>
                    <td>Key</td>
                    <td>String</td>
                    <td>Required</td>
                    <td>API Key</td>
                  </tr>
                  <tr>
                    <td>GET</td>
                    <td>Id</td>
                    <td>String</td>
                    <td>Optional</td>
                    <td>Id MAKANAN</td>
                  </tr>
                </tbody>
            </table>
            </div>
            <div id="section17">
              <h4>Contoh Request RESEP MAKANAN</h4>
              <div class="card">
                <div class="card-header" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Request</div>
                <div class="card-body"style="background-color: #333333; color: #fff;"><pre><code>&lt;?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/apimkn/getonemkn1.php?id=2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: your-api-key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?&gt;</code></pre>
                </div>
              </div>
            </div>
            <div id="section18">
              <h4>Contoh Response RESEP MAKANAN</h4>
              <div class="card">
                <div class="card-header" style="background-color: #006400; color: #fff; font-size: 12px; padding: 6px;">Response</div>
                <div class="card-body"style="background-color: #333333; color: #fff;"><pre><code>
{
    "status": {
        "code": 200,
        "description": "Request Valid"
    },
    "results": [
        {
            "id": "2",
            "nama": "Roti Maros",
            "bahan": "500 gr terigu 100 gr gula halus 11 gr ragi instan 2 butir kuning telur 40 gr margarin 50 gr air (kurang lebih dan masukkan air sedikit demi sedik 200 gr gula me 200 ml air 1 kara kemasan kecil + air hingga 150 ml 1 telur 4 sdm terigu 3 sdm gula pasir (tambahkan sesuai selera kalau dirasa kurang manis) seujung sendok garam secubit vanili",
            "cara_masak": "Buat isinya terlebih dulu.. rebus gula merah dg air lalu saring. Tuang lagi ke panci. Di wadah lain, campurkan kara, air, telur, garam, vanili dan terigu aduk rata masukkan ke air gula merah masak sampai mendidih sambil terus diaduk. Aduk terus biarkan mendidih beberapa saat supaya benar2 tanak.  Kemudian buat rotinya.. campurkan semua bahan kecuali margarin. Uleni sampai tercampur. Tambahkan margarin. Uleni lagi sampai kalis. Saya lanjutkan pakai mixer kaki spiral 5menit sj sampai kalis elastis. Istirahatkan adonan hingga mengembang 2x lipat.  Poles talam dengan margarin, bentuk roti sesuai selera. Roti maros biasanya dibentuk seperti roti kasur. Biarkan mengembang 2x lipat.  Dan panggang hinggga matang.  Sudah matang keluarkan dr cetakan poles margarin atasnya selagi panas. Biarkan dingin  Belah roti lalu beri isi selai kaya gula merah. Kemudian ditutup kembali."
}
</pre></code>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy;API MAKANAN KHAS SULAWESI SELATAN.</p>
  </footer>
</body>
</html>
