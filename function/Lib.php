<?php
  class Lib{
    // koneksi ke database
    function __construct(){
      $this->db =  new PDO('mysql:host=localhost;dbname=dbDasar;','root','resistance');
    }

    // menampilkan data dari database
    function tampil_data(){
      return $data = $this->db->query("SELECT * FROM user");
    }

    // untuk tambah data
    function tambah_data($nim,$nama,$jurusan,$alamat){
      $data = $this->db->query("INSERT INTO user (nim,nama,jurusan,alamat) VALUES ('$nim','$nama','$jurusan','$alamat')");

      // untuk pengujian jika tombol submit di klik
      if(!$data){
        return "False";
      }else {
        return "True";
      }
    }

    // mengambil id data untuk di tindak lanjuti(edit)
    function edit_data($id){
      return $this->db->query("SELECT * FROM user WHERE id_user='$id'");
    }

    // update data yang ada
    function update_data($id,$nim,$nama,$jurusan,$alamat){
      $query = $this->db->query("UPDATE user SET nim='$nim', nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE id_user='$id'");

      // untuk pengujian jka tombol submit di klik
      if(!$query){
        return "False";
      }else{
        return "True";
      }
    }

    // mengambil id data untuk di tindak lanjuti(delete)
    function delete_data($id){
      return $query = $this->db->query("DELETE FROM user WHERE id_user = '$id'");
    }

  }


?>
