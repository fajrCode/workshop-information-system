<?php
require_once '../main/function.php';

// ambil id di url
$table = "pemateri";
$field = "id_pemateri";
$isi_field = $_GET['id_pemateri'];

//query data pemateri
$show = querySelect($table, $field, $isi_field)[0];

if (isset($_POST['batal'])) {
  header('Location: showUsers.php');
  exit;
}

require_once '../template/sidebar.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
  if (updatePemateri($_POST) > 0) {
    echo "<script>
            alertSuccesGo('Selamat, data berhasil diubah','showPemateri.php')
          </script>";
  } else {
    echo "<script>
            alertFailGo('maaf, data gagal diubah, silahkan cek dan ulangi kembali', 'updatePemateri.php?id_pemateri=$isi_field')
          </script>";
  }
}

?>
<section class="section profile">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-1">
          <h5 class="card-title">Update Data Pemateri</h5>
          <div class="tab-content pt-2">

            <form action="" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id_pemateri" value="<?php echo $show["id_pemateri"] ?>">
              <input type="hidden" name="gambarLama" value="<?php echo $show["gambar"] ?>">

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Nama Pemateri</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="nama_pemateri" id="nama_pemateri" value="<?php echo $show["nama_pemateri"] ?>" required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Jenis Kelamin</label>
                <div class="col-md-8 col-lg-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk_pemateri" id="gridRadios1" value="Laki-Laki" <?= $show['jk_pemateri'] == 'Laki-laki' ? 'checked' : "" ?>>
                    <label class="form-check-label" for="gridRadios1">
                      Laki-Laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk_pemateri" id="gridRadios2" value="Perempuan" <?= $show['jk_pemateri'] == 'Perempuan' ? 'checked' : "" ?>>
                    <label class="form-check-label" for="gridRadios2">
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">No WhatsApps</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="wa_pemateri" id="wa_pemateri" value="<?php echo $show["wa_pemateri"] ?>" required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Deskripsi</label>
                <div class="col-md-8 col-lg-10">
                  <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?php echo $show["deskripsi"] ?>">
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
              <div class="text-center">
                <button class="btn btn-primary" type="submit" name="submit">Perbaharui</button>
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