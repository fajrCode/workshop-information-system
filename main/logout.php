<?php
session_start();
$_SESSION = [];
session_unset();

session_destroy();

echo "<script>
        alert('Anda berhasil logout');
      </script>";

// hapus cookie
// setcookie('key', '',);
// setcookie('keyy', '',);

header("Location: ../index.php");
exit;
