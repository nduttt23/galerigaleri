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
    <title>Halaman Foto</title>
    <link rel="icon" type="imagejpg/" href="logolink.png">
    <link rel="stylesheet" href="./css/bootstrap.main.css">
    <style>
        /* CSS styles */
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
            color: black;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: white;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #DA7910;
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

        form {
            max-width: 35%;
            margin: 20px auto;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        form table {
            width: 100%;
        }

        form table tr {
            margin-bottom: 15px;
        }

        form table tr:last-child {
            margin-bottom: 0;
        }

        form table td {
            padding: 10px;
            text-align: center;
        }

        form table input[type="text"],
        form table input[type="file"],
        form table select {
            width: calc(100% - 20px); /* Take up 100% width minus padding */
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form table input[type="submit"] {
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form table input[type="submit"]:hover {
            background-color: #9999CC;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid black;
        }

        th {
            background-color: blue;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #FFFFFF;
        }

        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
        }

        td:last-child {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #900C72;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color: #EDA371;
        }

        b {
            color: #DA7910;
        }

        .register-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #495057;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .register-button:hover {
            background-color: #495057;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFFFFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #495057;
        }

        /* Responsive CSS */
        @media screen and (max-width: 768px) {
            form {
                max-width: 80%;
            }

            table {
                width: 100%;
            }

            img {
                max-width: 80px;
            }
        }

        @media screen and (max-width: 480px) {
            form {
                max-width: 90%;
            }

            img {
                max-width: 60px;
            }
        }
    </style>
</head>
<body background="bg2.jpg">
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
    <h1>Tambah Foto</h1>

    <!-- Table to display existing photos -->
    <table border="1" cellpadding="5" cellspacing="0">
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <a style="color: blue;" href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                        <a style="color: red;" href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>

    <!-- Form to add photo -->
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <table>
            <th><h4>Tambah Foto</h4></th>
            <th><h4></h4></th>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="judulfoto" id="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" id="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile" id="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid" id="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" style="color: white;" value="Tambah"></td>
            </tr>
        </table>
    </form>

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
      <p style="font-style: italic;">Jelajahi keindahan dunia melalui karya seni di web galeri muhamad fathir</p>
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
        // JavaScript validation function
        function validateForm() {
            var judulFoto = document.getElementById("judulfoto").value.trim();
            var deskripsiFoto = document.getElementById("deskripsifoto").value.trim();
            var lokasiFile = document.getElementById("lokasifile").value.trim();
            var albumId = document.getElementById("albumid").value;

            // Check if any field is empty
            if (judulFoto === "" || deskripsiFoto === "" || lokasiFile === "" || albumId === "") {
                alert("Semua kolom wajib diisi!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
