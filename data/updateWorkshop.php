<?php

require_once '../main/function.php';

// ambil id di url
$table = "workshop";
$field = "id_workshop";
$isi_field = $_GET['id_workshop'];

//query data workshop
$show = querySelect($table, $field, $isi_field)[0];

if (isset($_POST['batal'])) {
  header('Location: showWorkshop.php');
  exit;
}

require_once '../template/sidebar.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
  if (updateWorkshop($_POST) > 0) {
    echo "<script>
            alertSuccesGo('Selamat, data berhasil diubah','showWorkshop.php')
          </script>";
  } else {
    echo "<script>
            alerFailGo('Maaf, data gagal diubah, silahkan cek dan perbaiki kembali!','updateWorkshop.php?id_workshop=$isi_field')
          </script>";
  }
}

?>

<section class="section profile">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-1">
          <h5 class="card-title">Update Data Workshop</h5>
          <div class="tab-content pt-2">

            <form action="" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id_workshop" value="<?php echo $show["id_workshop"] ?>">
              <input type="hidden" name="gambarLama" value="<?php echo $show["gambar"] ?>">

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Judul</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="judul" id="judul" value="<?php echo $show["judul"] ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Nama Pemateri</label>
                <div class="col-md-1 col-lg-3">
                  <select class="form-select" aria-label="Default select example" name="nama_pemateri" id="nama_pemateri">
                    <?php
                    $rows = querySelectWorkshop($table, $field, $isi_field)[0];
                    $row = queryShow("SELECT nama_pemateri FROM pemateri");
                    foreach ($row as $r) { ?>
                      <option <?= $r['nama_pemateri'] == $rows['nama_pemateri'] ? 'selected' : '' ?> value=<?= $r['nama_pemateri'] ?>> <?= $r['nama_pemateri'] ?> </option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Deskripsi</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="deskripsi" id="deskripsi" value="<?php echo $show["deskripsi"] ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Kuota</label>
                <div class="col-md-1 col-lg-1">
                  <input class="form-control" type="number" name="kuota" id="kuota" value="<?php echo $show["kuota"] ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Tanggal Mulai</label>
                <div class="col-md-2 col-lg-3">
                  <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai" value="<?php echo $show["tgl_mulai"] ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Tanggal Selesai</label>
                <div class="col-md-2 col-lg-3">
                  <input class="form-control" type="date" name="tgl_selesai" id="tgl_selesai" value="<?php echo $show["tgl_selesai"] ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Lokasi</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="lokasi" id="lokasi" value="<?php echo $show["lokasi"] ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Gambar</label>
                <div class="col-md-8 col-lg-10">
                  <img src="../gambar/<?php echo $show["gambar"] ?>" width="75px">
                  <div class="input-group mb-3">
                    <input type="file" name="gambar" class="form-control">
                  </div>
                </div>
              </div>


              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Harga</label>
                <div class="col-md-8 col-lg-10">
                  <div class="input-group mb-1">
                    <span class="input-group-text">Rp. </span>
                    <input type="number" name='biaya' class="form-control" value="<?php echo $show['biaya'] ?>">
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button class="btn btn-primary" name="submit">Perbaharui</button>
                <button class="btn btn-danger" name="batal">Batal</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once '../template/footer.php'; ?>