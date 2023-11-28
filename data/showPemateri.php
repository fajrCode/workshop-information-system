<?php
// session_start();
// if (!isset($_SESSION['login'])) {
//   header("Location: ../login.php");
// }
require_once '../main/function.php';

$table = 'pemateri';
$show = showAllData($table);


require_once '../template/sidebar.php';

?>

<div class="pagetitle">
  <h1>Pemateri</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Pemateri</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<?php if ($test == "Admin") { ?>

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="addPemateri.php" class="m-0 font-weight-bold text-primary float-right">Tambah Data</a>
            </div>
            <div class="card-body pb-5">
              <table class="table datatable" width="100%" cellspacing="0">
                <thead>

                  <tr>
                    <th>No</th>
                    <th>Nama Pemateri</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>No WhatsApps</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
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
                      <td><?php echo $r["nama_pemateri"] ?></td>
                      <td><?php echo $r["jk_pemateri"] ?></td>
                      <td><?php echo $r["job"] ?></td>
                      <td><?php echo $r["wa_pemateri"] ?></td>
                      <td><img src="../gambar/<?php echo $r["gambar"] ?>" width="50"></td>
                      <td><?php echo $r["deskripsi"] ?></td>
                      <td>
                        <a class="btn btn-outline-primary" href="updatePemateri.php?id_pemateri=<?php echo $r["id_pemateri"] ?>">Ubah</a>
                        <button class="btn btn-outline-danger" onclick="sweetConfirm('deletePemateri.php?id_pemateri=<?php echo $r['id_pemateri'] ?>')">Hapus</button>
                      </td>
                    </tr>
                  <?php }; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
    </div>

  </section>

<?php } else { ?>

  <section class="section dashboard">


    <div class="row row-cols-3 row-cols-md-4">
      <?php
      $number = 1;
      foreach ($show as $r) { ?>
        <div class="card-group" style="margin-top: 15px;">
          <div class="card">
            <img car src="../gambar/<?php echo $r["gambar"] ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $r["nama_pemateri"] ?></h5>
              <span><?php echo $r["job"] ?></span>
              <p class="card-text"><?php echo $r["deskripsi"] ?></p>
            </div>
          </div><!-- End Card with an image on top -->
        </div>
      <?php }; ?>
    </div>

  </section><!-- End Services Section -->

<?php } ?>

<?php require_once '../template/footer.php' ?>