<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>silahkaan login terlebih dahulu</title>
</head>
<link rel="stylesheet" href="login.css" type="text/css">
<body>
    <div class="wrapper">
        <form method="post" action="proseslogin.php">
            <h2>Login</h2>
            <div class="input-box">
            <input type="text" name="username" placeholder="USERNAME" required>
            </div>
            <div class="input-box">
            <input type="password" name="password" placeholder="PASSWORD" required>
            </div>
            <button type="submit">Login</button>
            <div class="logging">
            <?php
            include "koneksi.php";
            $query = mysqli_query ($koneksi, "SELECT * FROM logging_yuris");
            $jum = mysqli_num_rows ($query);
            echo "jumlah pengunjung : $jum";
            ?>
            </div>
        </form>
    </div>
</body>
</html>