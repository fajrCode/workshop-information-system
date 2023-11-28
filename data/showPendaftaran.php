<?php

// session_start();
// if (!isset($_SESSION['login'])) {
//   header("Location: ../login.php");
// }

require_once '../main/function.php';
require_once '../template/sidebar.php';

$show = showAllPendaftaran();

?>

<div class="pagetitle">
  <h1>Pendaftaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Pendaftaran</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard" style="margin-bottom: 70px;">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <div class="card shadow mb-4">
          <div class="card-body pb-5" style="margin-top: 20px;">
            <table class="table datatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Id</th>
                  <th>Nama Peserta</th>
                  <th>Judul Workshop</th>
                  <th>Tanggal Pendaftaran</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Bukti bayar</th>
                  <th>Status Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $number = 1;
                foreach ($show as $r) { ?>
                  <tr>
                    <td>
                      <?php
                      echo ($number++);
                      ?>
                    </td>
                    <td><?php echo $r["id_pendaftaran"] ?></td>
                    <td><?php echo $r["nama"] ?></td>
                    <td><?php echo $r["judul"] ?></td>
                    <td><?php echo $r["tgl_daftar"] ?></td>
                    <td><?php echo $r["tgl_bayar"] ?></td>
                    <td><img src="../gambar/<?php echo $r["gambar"] ?>" width="50"></td>
                    <td><?php echo $r["status"] ?></td>
                  </tr>
                <?php }; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once '../template/footer.php';  ?>