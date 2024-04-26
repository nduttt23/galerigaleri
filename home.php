<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>galeri foto</title>
    <link rel="icon" type="imagejpg/" href="logolink.png">
    <link rel="stylesheet" href="./css/bootstrap.main.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #9999CC;
            color: #5E616B;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #283747;
            font-size: 16px; /* Ukuran teks pada layar besar */
        }

        ul {
            list-style-type: none;
            padding: 15px;
            text-align: center;
            margin-top: 15px;
        }

        ul li {
            display: inline;
            margin-right: 10px;
        }

        ul li a {
        text-decoration: none;
        color: #FCF1EF;
        padding: 8px 16px;
        border-radius: 15px;
        transition: background-color 0.3s ease;
        background-color: #F28C77;
        }

        ul li a:hover {
            background-color: #FCF1EF;
            color: #F28C77;
        }

        a {
            text-decoration: none;
            color:   #900C72;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color:  #5E616B;
        }

        b {
            color: #283747;
        }

        .register-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: #0056b3;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #495057;
        }

        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2px;
            column-gap: 60px;
            max-width: 900px; /* Mengatur lebar maksimum kontainer */
            margin: 0 auto; /* Pusatkan kontainer di tengah */
        }

        .category-item {
            width: calc(20% - 20px);
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px #283747;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .category-item img {
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }

        .category-item p {
            margin-top: 10px;
            font-size: 16px;
            text-align: center;
            color: #283747;
        }

        .login-message {
            text-align: center;
            margin-top: 20px;
            color: #900C72;
            font-size: 18px;
        }

        .landing-page {
            display: <?php echo isset($_SESSION['userid']) ? 'none' : 'block'; ?>;
            text-align: center;
            margin-top: 20px;
            color: #DA7910;
        }

        .category-icon {
        width: 50%; /* Mengatur lebar gambar sesuai dengan lebar kontainer */
        height: auto; /* Memastikan gambar tetap proporsional */
        border-radius: 5px;
        }

        /* Tambahkan media queries untuk ukuran layar yang lebih kecil */
        @media screen and (max-width: 768px) {
            .category-container {
                column-gap: 20px; /* Mengurangi jarak antar kolom */
                max-width: 90%; /* Mengatur lebar maksimum kontainer */
            }

            .category-item {
                width: calc(33.33% - 20px); /* Mengatur lebar item kategori pada layar kecil */
            }

            .category-icon {
                width: 100%; /* Mengatur lebar gambar sesuai dengan lebar kontainer */
            }

            h1 {
                font-size: 24px; /* Mengurangi ukuran judul pada layar kecil */
                margin-top: 10px; /* Mengurangi jarak atas judul pada layar kecil */
            }

            p {
                font-size: 14px; /* Mengurangi ukuran teks pada layar kecil */
            }

            ul li a {
                padding: 5px 10px; /* Mengurangi padding tombol pada layar kecil */
            }
        }

        .container-fluid {
            /* background-color: #007bff; */
        }
    </style>
</head>
<body background="bage.jpg">
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="album.php">Album</a>
        <a class="nav-link" href="foto.php">Foto</a>
        <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>
    <!-- category -->
    <?php
        // Cek apakah pengguna sudah login
        if(isset($_SESSION['userid'])) {
    ?>
    <div class="section">
        <div class="container">
            <h3 style=" margin-top: 40px; margin-bottom: 20px; color:#007bff;">Semua Album</h3>
            <div class="category-container">
                <?php
                    include "koneksi.php";
                    $sql=mysqli_query($conn,"select * from album,user where album.userid=user.userid");
                    if(mysqli_num_rows($sql) > 0){
                        while($data=mysqli_fetch_array($sql)){
                ?>
                    <div class="category-item" style="margin-top: 20px; margin-bottom: 20px;">
                        <a href="galeri.php?kat=<?php echo $data['albumid'] ?>">
                        <img src="logo2.jpg" alt="<?php echo $data['namaalbum'] ?>" class="category-icon">
                         <p style="text-align: center;"><?php echo $data['namaalbum'] ?>Judul: </p>
                         <p style="text-align: left:"><?php echo $data['deskripsi'] ?>Deskripsi: </p>
                        </a>
                    </div>

                <?php 
                        }
                    } else {
                ?>
                        <p style="text-align: center;">data album tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
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

</body>
</html>