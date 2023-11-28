<?php

// session_start();
// if (!isset($_SESSION['login'])) {
//   header("Location: ../login.php");
// }

require_once '../main/function.php';

$table = 'workshop';
$show = showAllWorkshop($table);


require_once '../template/sidebar.php';

?>

<div class="pagetitle">
  <h1>Workshop</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Workshop</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <a href="addWorkshop.php" class="m-0 font-weight-bold text-primary float-right">Tambah Data</a>
          </div>
          <div class="card-body pb-5">
            <table class="table datatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Nama Pemateri</th>
                  <th>Deskripsi</th>
                  <th>Kuota</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Lama Workshop</th>
                  <th>Lokasi Workshop</th>
                  <th>Gambar</th>
                  <th>Biaya</th>
                  <th>Aksi</th>
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
                    <td><?php echo $r["judul"] ?></td>
                    <td><?php echo $r["nama_pemateri"] ?></td>
                    <td><?php echo $r["deskripsi"] ?></td>
                    <td><?php echo $r["kuota"] ?></td>
                    <td><?php echo $r["tgl_mulai"] ?></td>
                    <td><?php echo $r["tgl_selesai"] ?></td>
                    <td><?php echo $r["lama_workshop"] ?></td>
                    <td><?php echo $r["lokasi"] ?></td>
                    <td><img src="../gambar/<?php echo $r["gambar"] ?>" width="50"></td>
                    <td><?php echo $r["biaya"] ?></td>
                    <td>
                      <a class="btn btn-outline-primary" href="updateWorkshop.php?id_workshop=<?php echo $r["id_workshop"] ?>">Ubah</a>
                      <a class="btn btn-outline-danger" href="deleteWorkshop.php?id_workshop=<?php echo $r["id_workshop"] ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">Hapus</a>
                    </td>
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