<?php

require_once '../main/function.php';

require_once '../template/sidebar.php';


$table = "users";
$field = "id_users";
$isi_field = $_GET['id_users'];

if (hapusData($table, $field, $isi_field) > 0) {
  echo '<script> function showAlert() {
          swal({icon: "success",
                text: "Selamat, Data Berhasil di Hapus",
                showConfirmButton: false,
              }).then(function() {window.location.href = "showUsers.php";});
          }
          showAlert();
          </script>';
} else {
  echo '<script> function showAlert() {
          swal({icon: "error",
                text: "Maaf, Data Gagal di Hapus",
                showConfirmButton: false,
              }).then(function() {window.location.href = "showUsers.php";});
          }
          showAlert();
          </script>';
}
