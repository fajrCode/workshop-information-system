<?php
require_once '../main/function.php';

setcookie('i', '2'); //jangan lupa hapus, kalau session sudah dicopas k sini
$idUsers = $_COOKIE['i']; //id users

//baris untuk menampilkan workshop
$table = 'workshop';

$show = showAllWorkshop($table);
require_once '../template/sidebar.php';

$qty = countData("pendaftaran");

?>

<div class="pagetitle">
  <h1>Daftar Workshop</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../main/dashboard.php">Home</a></li>
      <li class="breadcrumb-item active">Workshop</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">


  <div class="row row-cols-3 row-cols-md-4">
    <?php
    $number = 1;
    foreach ($show as $r) { ?>
      <div class="card-group" style="margin-top: 15px;">
        <div class="card">
          <img car src="../gambar/<?php echo $r["gambar"] ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $r["judul"] ?></h5>
            <p class="card-text"><?php echo $r["deskripsi"] ?></p>

            <table class="card-text">
              <tr>
                <td>Pemateri</td>
                <td><?php echo $r["nama_pemateri"] ?></td>
              </tr>
              <tr>
                <td width="150px">Tanggal Mulai</td>
                <td><?php echo date("d M Y", strtotime($r["tgl_mulai"])) ?></td>
              </tr>
              <tr>
                <td>Tanggal Selesai</td>
                <td><?php echo date("d M Y", strtotime($r["tgl_selesai"])) ?></td>
              </tr>
              <tr>
                <td>Lama Event</td>
                <td><?php echo $r["lama_workshop"] ?></td>
              </tr>
              <tr>
                <td>Kuota</td>
                <td><?php
                    $slot = countSelectData($r["id_workshop"]);
                    echo $slot . '/' . $r["kuota"] ?></td>
              </tr>
              <tr>
                <td>Sisa Kuota</td>
                <td><?php
                    $slot = countSelectData($r["id_workshop"]);
                    $sisa = $r["kuota"] - $slot;
                    echo $sisa ?></td>
              </tr>
              <tr>
                <td>Harga</td>
                <td><?php if ($r["biaya"] == 0) {
                      echo 'GRATISSS';
                    } else {
                      echo "Rp. " . number_format($r["biaya"], 0, ",", ".");
                    } ?></td>
              </tr>
            </table>

          </div>

          <?php if ($r["tgl_mulai"] < $now) { ?>
            <div class="card-footer text-center">
              <button onclick="pesan('Maaf kuota sudah penuh / Event telah berakhir')" class="btn btn-outline-danger">Daftar</button>
            </div>
          <?php } elseif (cekDaftar($idUsers, $r['id_workshop'])) { ?>
            <div class="card-footer text-center">
              <button onclick="pesan('Maaf, Anda sudah terdaftar pada workshop ini.')" class="btn btn-outline-danger">Daftar</button>
            </div>
          <?php } else {  ?>
            <div class="card-footer text-center">
              <a class="btn btn-outline-primary" href="confirmDaftar.php?id_workshop=<?php echo $r["id_workshop"] ?>">Daftar</a>
            </div>
          <?php } ?>

        </div><!-- End Card with an image on top -->
      </div>
    <?php }; ?>
  </div>



</section><!-- End Services Section -->

<?php require_once '../template/footer.php' ?>