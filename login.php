<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="icon" type="imagejpg/" href="logolink.png">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="css/bootstrap.main.css">
</head>

<body style="background-image: url('bg.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">  
<div id="wrapper">
    <div id="header">
        <h1 style="color: white">Login</h1>
        <?php
            // Check if error is set and not empty
            if(isset($_GET['error']) && !empty($_GET['error'])) {
                echo '<p style="color: white;">Username atau password salah!</p>';
            }
        ?>
        <form id="loginForm" action="proses_login.php" method="post" onsubmit="return validateForm()">
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
                    <td></td>
                    <td><input style="color: white;" type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
        <!-- Tombol Registrasi -->
        <div style="text-align: center; margin-top: 10px;">
            <a href="register.php" style="text-decoration: none; color: white;">Belum punya akun? <span style="color: blue;">Registrasi di sini!</span></a>
        </div>
    </div>
</div>

<!-- FOOTER dan STYLE FOOTERNYA -->
<style>
    .footer {
      background-color: #222831;
      color: white;
      padding: 20px 0;
    }

    .footer-icon {
      font-size: 24px;
      margin: 0 10px;
      color: white;
    }

    .site-footer {
      background: #000;
      padding-top: 10px;
      color: white;
      text-align: center;
      align-self: center;
    }
  </style>

  <footer class="footer py-1">
    <div class="container text-center">
      <h3 style="color: white;">&copy; 2024 UKK RPL</h3>
      <p style="font-style: italic; color:#DA7910">Jelajahi keindahan dunia melalui karya seni di web galeri muhamad fathir</p>
      <div>
        <a href="#" class="footer-icon"><i class='bx bxl-facebook'></i></a>
        <a href="#" class="footer-icon"><i class='bx bxl-twitter'></i></a>
        <a href="#" class="footer-icon"><i class='bx bxl-instagram'></i></a>
      </div>
    </div>
  </footer>

  <footer class="site-footer text-center py-3">
    <p style="color: white;">&copy; Web Galeri Fathir</p>
  </footer>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username === "" || password === "") {
            alert("Username dan Password wajib diisi!");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
