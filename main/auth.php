<?php  

if (isset($_SESSION['peserta'])) {
  header("Location: home.php");
  $rule= $_COOKIE['i'];
  exit;
} elseif (isset($_SESSION['admin'])) {
  header("Location: Dashboard.php");
  exit;
}
