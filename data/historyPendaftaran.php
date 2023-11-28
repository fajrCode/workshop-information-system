<?php
require_once '../main/function.php';

setcookie('i', '2'); //jangan lupa hapus, kalau session sudah dicopas k sini
$idUsers = $_COOKIE['i']; //id users

//baris untuk menampilkan workshop

$show = showSelectPendaftaran($idUsers);

require_once '../template/sidebar.php';

?>

<div class="pagetitle">
  <h1>History Pendaftaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../main/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="">History</a></li>
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
          <div class="card-body pb-3" style="margin-top: 20px;">
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul Workshop</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Pemateri</th>
                  <th scope="col">Tanggal Mulai</th>
                  <th scope="col">Tanggal Daftar</th>
                  <th scope="col">Status Pendaftaran</th>
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
                    <td><?php echo $r["deskripsi"] ?></td>
                    <td><?php echo $r["nama_pemateri"] ?></td>
                    <td><?php echo date("d M Y", strtotime($r["tgl_mulai"])) ?></td>
                    <td><?php echo date("d M Y", strtotime($r["tgl_daftar"])) ?></td>
                    <td><span class="badge bg-success"><?php echo $r["status_bayar"] ?></span></td>
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

<?php require_once '../template/footer.php' ?>