<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" type="imagejpg/" href="logolink.png">
    <link rel="stylesheet" href="./css/bootstrap.main.css">
    
</head>
<body style="background-image: url('bg.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
<div id="wrapper">
    <div id="header">
    <h1 style="color: white">Registrasi</h1>
    <?php
        // Check if user is not logged in
        if(!isset($_SESSION['userid'])) {
    ?>
    <?php } ?>
    <form action="proses_register.php" method="post" onsubmit="return validateForm()">
        <table>
            <tr>
                <td style="color: white">Username</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td style="color: white">Password</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td style="color: white">Email</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td style="color: white">Nama Lengkap</td>
                <td><input type="text" name="namalengkap" id="namalengkap"></td>
            </tr>
            <tr>
                <td style="color: white">Alamat</td>
                <td><input type="text" name="alamat" id="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" style="color: white;" name="submit" value="register"></td>
            </tr>
        </table>
    </form>
    <div class="botton">
                <p style="color: aliceblue;">Sudah Punya Akun?
                    <a href="login.php">Login disini</a>
                </p>
            </div>
</div>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var email = document.getElementById("email").value;
        var namalengkap = document.getElementById("namalengkap").value;
        var alamat = document.getElementById("alamat").value;

        if (username === "" || password === "" || email === "" || namalengkap === "" || alamat === "") {
            alert("Semua kolom harus diisi!");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
