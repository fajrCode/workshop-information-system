<?php
require_once '../main/function.php';

$idDaftar = $_GET['id_pendaftaran'];

if (isset($_POST['batal'])) {
  header("Location: myWorkshop.php");
  exit;
}
require_once '../template/sidebar.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
  if (addAbsen($_POST) > 0) {
    echo "<script>
            alertSuccesGo('Selamat, anda berhasil absen','myWorkshop.php')
          </script>";
  } else {
    echo "<script>
            alertFailGo('Maaf, anda gagal absen, cek dan ulangi kembali', 'absen.php')
          </script>";
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

              <input type="hidden" name="id_pendaftaran" value="<?php echo $idDaftar ?>">

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Pilih kehadiran mu</label>
                <div class="col-md-8 col-lg-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="absen" id="gridRadios1" value="Hadir">
                    <label class="form-check-label" for="gridRadios1">
                      Hadir
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="absen" id="gridRadios2" value="Terlambat">
                    <label class="form-check-label" for="gridRadios2">
                      Terlambat
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="absen" id="gridRadios3" value="Tidak hadir">
                    <label class="form-check-label" for="gridRadios3">
                      Tidak bisa Hadir
                    </label>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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