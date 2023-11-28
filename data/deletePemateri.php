<?php

require_once '../main/function.php';

require_once '../template/sidebar.php';


$table = "pemateri";
$field = "id_pemateri";
$isi_field = $_GET['id_pemateri'];

if (hapusData($table, $field, $isi_field) > 0) {
  echo '<script> function showAlert() {
          swal({icon: "success",
                text: "Selamat, Data Berhasil di Hapus",
                showConfirmButton: false,
              }).then(function() {window.location.href = "showPemateri.php";});
          }
          showAlert();
          </script>';
} else {
  echo '<script> function showAlert() {
          swal({icon: "error",
                text: "Maaf, Data Gagal di Hapus",
                showConfirmButton: false,
              }).then(function() {window.location.href = "showPemateri.php";});
          }
          showAlert();
          </script>';
}
