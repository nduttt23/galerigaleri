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
    <title>Halaman Edit Album</title>
    <link rel="stylesheet" href="style.css"/>
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
    color: #900C72;
    background-image: url(bg2.jpg);
}

h1 {
    text-align: center;
    margin-top: 20px;
    color: #6b3b08;
}

p {
    text-align: center;
    margin-top: 10px;
    color: #6b3b08;
}

ul {
    list-style-type: none;
    padding: 0;
    text-align: center;
    margin-top: 20px;
}

ul li {
    display: inline;
    margin-right: 10px;
}

ul li a {
    text-decoration: none;
    color: #900C72;
    padding: 8px 16px;
    border-radius: 15px;
    transition: background-color 0.3s ease;
    background-color: #DA7910;
}

ul li a:hover {
    background-color: #FC9AFF;
    color: #900C72;
}

form table {
    width: 100%;
    margin-top: 20px;
}

form table tr {
    margin-bottom: 15px;
}

form table tr:last-child {
    margin-bottom: 0;
}

form table td {
    padding: 10px;
    color: #6b3b08;
}

form table input[type="text"],
form table input[type="file"],
form table select {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

form table input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: blue;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form table input[type="submit"]:hover {
    background-color: #E0600B;
}
    </style>
</head>
<body>
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
 <br>
 <center>
   <h1 style="color: white;">Halaman Edit</h1>
 </center>
<div id="wrapper">
    <div id="header">
 <h1 style="color: white">Edit Album Foto</h1>

    <form action="update_album.php" method="post">
        <?php
            include "koneksi.php";
            $albumid=$_GET['albumid'];
            $sql=mysqli_query($conn,"select * from album where albumid='$albumid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
        <table>
            <tr>
                <td style="color: white">Nama Album</td>
                <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td style="color: white">Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Perbarui"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
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
      <h3>&copy; 2024 UKK RPL</h3>
      <p style="font-style: italic; color:#DA7910;">Jelajahi keindahan dunia melalui karya seni di web galeri muhamad fathir</p>
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