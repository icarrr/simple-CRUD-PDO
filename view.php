<?php
  require('function/core.php');
  $data = $database->tampil_data();

  // jika tombol dengan identitas delete diklik, maka jalankan script berikut
  if(isset($_GET['delete'])){
    $delete = $database->delete_data($_GET['delete']);
    header('location: view.php');
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View</title>
  </head>
  <body>
    <a href="index.php">Tambah data</a>
    <br>

    <table border="1">
      <thead>
        <tr>
          <th>ID</th>
          <th>NIM</th>
          <th>NAMA</th>
          <th>JURUSAN</th>
          <th>ALAMAT</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <!-- script perulangan agar dapat menampilkan data sesuai banyaknya yang ada dalam database  -->
        <?php while($row = $data->fetch(PDO::FETCH_OBJ)) { ?>
        <tr>
          <td><?php echo $row->id_user; ?></td>
          <td><?php echo $row->nim; ?></td>
          <td><?php echo $row->nama; ?></td>
          <td><?php echo $row->jurusan; ?></td>
          <td><?php echo $row->alamat; ?></td>
          <td>
            <a href="edit.php?id=<?= $row->id_user;?>">Edit</a> |
            <a href="?delete=<?= $row->id_user; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </body>
</html>
