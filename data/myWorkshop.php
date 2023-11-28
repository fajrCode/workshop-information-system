<?php
require_once '../main/function.php';

setcookie('i', '2'); //jangan lupa hapus, kalau session sudah dicopas k sini
$idUsers = $_COOKIE['i']; //id users

//baris untuk menampilkan workshop
$table = 'pendaftaran';

$show = showSelectPendaftaranBaru($idUsers);
$absen = queryShow("SELECT absen FROM absensi WHERE ");
require_once '../template/sidebar.php';

$qty = countData("pendaftaran");

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

<section class="section dashboard">

  <div class="row row-cols-3 row-cols-md-4">
    <?php
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
                <td>Tanggal Mendaftar</td>
                <td><?php echo date("d M Y", strtotime($r["tgl_daftar"])) ?></td>
              </tr>
              <tr>
                <td>Status Event</td>
                <td><?php
                    $tglStart = $r["tgl_mulai"];
                    if ($tglStart == $now) {
                      // Tanggal sama dengan tanggal hari ini
                      echo "Sedang berlangsung";
                    } elseif ($tglStart < $now) {
                      // Tanggal lewat dari tanggal hari ini
                      echo "Sudah berakhir";
                    } else {
                      // Tanggal belum lewat dari tanggal hari ini
                      echo "Belum dimulai";
                    } ?></td>
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

          <?php if ($r["tgl_mulai"] == $now) { ?>
            <div class="card-footer text-center">
              <a class="btn btn-outline-primary" href="absen.php?id_pendaftaran=<?php echo $r["id_pendaftaran"] ?>">Absen</a>
            </div>
          <?php } elseif ($r['absen']=='Hadir' || $r['absen']=='Terlambat' || $r['absen']=='Tidak hadir' || $r['absen']=='Alfa' ) {  ?>
            <div class="card-footer text-center">
              <button onclick="pesan('Maaf, workshopnya belum dimulai kakak')" class="btn btn-outline-danger">Absen</button>
            </div>
          <?php } else {  ?>
            <div class="card-footer text-center">
              <button onclick="pesan('Maaf, workshopnya belum dimulai kakak')" class="btn btn-outline-danger">Absen</button>
            </div>
          <?php } ?>

        </div><!-- End Card with an image on top -->
      </div>
    <?php }; ?>
  </div>

</section><!-- End Services Section -->

<?php require_once '../template/footer.php' ?>