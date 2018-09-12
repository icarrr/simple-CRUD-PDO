<?php
  require('function/core.php'); // memanggil function

  // jika tombol submit di klik, akan mengirim data berikut
  if(isset($_POST['submit'])){
    $nim = $_POST['nim']; // variabel nim diisi sesuai yang memiliki identitas nim
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    // agar tidak bisa mengirim data jika ada form yang belum di isi
    if(!empty(trim($nim)) && !empty(trim($nama)) && !empty(trim($jurusan)) && !empty(trim($alamat))){
      $input = $database->tambah_data($nim,$nama,$jurusan,$alamat);

      if($input == "True"){
        header('location: view.php'); // sebagai pengecekan, jika berhasil update diredirect ke page view
      }
      }else{
        echo "Gagal input data";
      }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>form input</title>
  </head>
  <body>
    <a href="view.php">Lihat data</a>
    <form action="index.php" method="post">
      <table>
        <tr>
          <td>Nim</td>
          <th> <input type="text" name="nim" placeholder="NIM" > </th>
        </tr>
        <tr>
          <td>Nama</td>
          <th> <input type="text" name="nama" placeholder="Nama" > </th>
        </tr>
        <tr>
          <td>Jurusan</td>
          <th> <input type="text" name="jurusan" placeholder="Jurusan" > </th>
        </tr>
        <tr>
          <td>Alamat</td>
          <th> <input type="text" name="alamat" placeholder="Alamat" > </th>
        </tr>
        <tr>
          <td></td>
          <td><button type="submit" name="submit">submit</button></td>
        </tr>
      </table>
    </form>
  </body>
</html>
