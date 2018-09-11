<?php
  require('function/core.php');

  if(isset($_GET['id'])){
    $edit = $database->edit_data($_GET['id']);
    $row = $edit->fetch(PDO::FETCH_OBJ);
  }

  if(isset($_POST['submit'])){
    $id        = $_GET['id'];
    $nim       = $_POST['nim'];
    $nama      = $_POST['nama'];
    $jurusan   = $_POST['jurusan'];
    $alamat    = $_POST['alamat'];

    $update = $database->update_data($id,$nim,$nama,$jurusan,$alamat);

    if($update == "True"){
      echo "Data up-to-date";
    }else {
      echo "Failed";
    }
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit data</title>
  </head>
  <body>
    <a href="view.php">Lihat data</a>
    <form action="" method="post">
      <table>
        <tr>
          <td>Nim</td>
          <td><input type="text" name="nim" placeholder="NIM" value="<?php echo $row->nim ?>"> </td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama" placeholder="Nama" value="<?php echo $row->nama ?>"> </td>
        </tr>
        <tr>
          <td>Jurusan</td>
          <td><input type="text" name="jurusan" placeholder="Jurusan" value="<?php echo $row->jurusan ?>"> </td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="alamat" rows="6" cols="17"><?php echo $row->alamat?></textarea> </td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="Submit"> </td>
        </tr>
      </table>
    </form>
  </body>
</html>
