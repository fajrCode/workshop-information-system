<?php
require_once '../main/function.php';

if (isset($_POST['batal'])) {
  header("Location: showPemateri.php");
  exit;
}
require_once '../template/sidebar.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
  if (addPemateri($_POST) > 0) {
    echo "<script>
            alertSuccesGo('Selamat, data berhasil ditambahkan','showPemateri.php')
          </script>";
  } else {
    echo "<script>
            alertFailGo('Maaf, data gagal tambahkan, silahkan cek dan ulangi kembali', 'addPemateri.php')
          </script>";
    echo mysqli_error($conn);
  }
}

?>

<section class="section profile">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-1">
          <h5 class="card-title">Tambah Data Pemateri</h5>
          <div class="tab-content pt-2">

            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Nama Pemateri</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="nama_pemateri" id="nama_pemateri" required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Jenis Kelamin</label>
                <div class="col-md-8 col-lg-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk_pemateri" id="gridRadios1" value="Laki-Laki">
                    <label class="form-check-label" for="gridRadios1">
                      Laki-Laki
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jk_pemateri" id="gridRadios2" value="Perempuan">
                    <label class="form-check-label" for="gridRadios2">
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Pekerjaan</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="job" id="job" required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">No WhatsApps</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="wa_pemateri" id="wa_pemateri" required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Deskripsi</label>
                <div class="col-md-8 col-lg-10">
                  <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Gambar</label>
                <div class="col-md-8 col-lg-10">
                  <input type="file" name="gambar" class="form-control">
                </div>
              </div>
              <div class="text-center">
                <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
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