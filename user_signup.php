<!DOCTYPE html>
<html>
<head>
    <title>User API Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/style4.css">
</head>
<body>
    <div class="container">
        <h1>User API Sign Up</h1>
        <form action="proses_signup.php" method="post" enctype="multipart/form-data">
            <label for="uname">Username</label><br>
            <input type="text" id="uname" name="uname"><br><br>

            <label for="pwd">Password</label><br>
            <input type="password" id="pwd" name="pwd"><br><br>

            <label for="namalengkap">Nama Lengkap</label><br>
            <input type="text" id="namalengkap" name="namalengkap"><br><br>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email"><br><br>

            <input type="submit" name="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
