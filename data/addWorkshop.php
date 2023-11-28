<?php
require_once '../main/function.php';


if (isset($_POST['batal'])) {
  header("Location: showWorkshop.php");
  exit;
}

require_once '../template/sidebar.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
  if (addWorkshop($_POST) > 0) {
    echo "<script>
            alertSuccesGo('Selamat, data berhasil ditambahkan','showWorkshop.php')
          </script>";
  } else {
    echo "<script>
            alertFailGo('Maaf, data gagal tambahkan, silahkan cek dan ulangi kembali', 'addWorkshop.php')
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
          <h5 class="card-title">Tambah Data Workshop</h5>
          <div class="tab-content pt-2">

            <form action="" method="POST" enctype="multipart/form-data">

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Judul</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="judul" id="judul">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Nama Pemateri</label>
                <div class="col-md-1 col-lg-3">
                  <select class="form-select" aria-label="Default select example" name="id_pemateri" id="nama_pemateri">
                    <option value="">-Pilih-</option>
                    <?php
                    $show = queryShow("SELECT id_pemateri, nama_pemateri FROM pemateri");
                    foreach ($show as $key) {
                      echo "<option value=" . $key['id_pemateri'] . ">" . $key['nama_pemateri'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Deskripsi</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="deskripsi" id="deskripsi">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Kuota</label>
                <div class="col-md-1 col-lg-1">
                  <input class="form-control" type="number" name="kuota" id="kuota">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Tanggal Mulai</label>
                <div class="col-md-2 col-lg-3">
                  <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Tanggal Selesai</label>
                <div class="col-md-2 col-lg-3">
                  <input class="form-control" type="date" name="tgl_selesai" id="tgl_selesai">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Lokasi</label>
                <div class="col-md-8 col-lg-10">
                  <input class="form-control" type="text" name="lokasi" id="lokasi">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Gambar</label>
                <div class="col-md-8 col-lg-10">
                  <input type="file" name="gambar" class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Harga</label>
                <div class="col-md-8 col-lg-10">
                  <div class="input-group mb-1">
                    <span class="input-group-text">Rp. </span>
                    <input type="number" name='biaya' class="form-control">
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button class="btn btn-primary" name="submit">Tambah</button>
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