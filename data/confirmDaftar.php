<?php
require_once '../main/function.php';


setcookie('i', '2'); //jangan lupa hapus, kalau session sudah dicopas k sini
$idUsers = $_COOKIE['i']; //id users
$idWorkshop = $_GET['id_workshop'];

require_once '../template/sidebar.php';

if (isset($_POST['daftar'])) {
  if (addPendaftaran($_POST) > 0) {
    echo '<script> 
            function showAlert() {
            swal({icon: "success",
            text: "Selamat, anda berhasil mendaftar",
            showConfirmButton: false,
            }).then(function() {window.location.href = "addPendaftaran.php";});
            }
            showAlert();
          </script>';
  } else {
    echo '<script> 
            function showAlert() {
            swal({icon: "success",
            text: "Selamat, anda berhasil mendaftar",
            showConfirmButton: false,
            }).then(function() {window.location.href = "confirmDaftar.php?id_workshop=' . $idWorkshop . '";});
            }
            showAlert();
          </script>';
  }
}

$su = select("users", "id_users", $idUsers)[0];
$sw = select("workshop", "id_workshop", $idWorkshop)[0];

$harga = 1;


?>

<section class="section profile">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-1">
          <h5 class="card-title">Selesaikan Pembayaran</h5>
          <div class="tab-content pt-2">

            <form action="" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id_users" value="<?php echo $idUsers ?>">
              <input type="hidden" name="id_workshop" value="<?php echo $idWorkshop ?>">

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Nama Pendaftar</label>
                <div class="col-md-8 col-lg-10">
                  <input type="text" class="form-control" value="<?php echo $su['nama'] ?>" disabled>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Judul Workshop</label>
                <div class="col-md-8 col-lg-10">
                  <input type="text" class="form-control" value="<?php echo $sw['judul'] ?>" disabled>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-md-3 col-lg-2 col-form-label">Tagihan</label>
                <div class="col-md-8 col-lg-10">
                  <div class="input-group mb-1">
                    <span class="input-group-text">Rp. </span>
                    <input type="number" class="form-control" value="<?php echo $sw['biaya'] ?>" disabled>
                  </div>
                </div>
              </div>
              <?php if ($harga > 0) { ?>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Metode Pembayaran</label>
                  <div class="col-md-8 col-lg-3">
                    <select class="form-select" aria-label="Default select example" name="metode">
                      <option value="">T_T Pilih Metode Pembayaran T_T</option>
                      <option value="Dana">Dana</option>
                      <option value="GoPay">GoPay</option>
                      <option value="OVO">OVO</option>
                      <option value="Link Aja">Link Aja</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Nomor Transfer</label>
                  <div class="col-md-8 col-lg-10">
                    <input type="text" class="form-control" value="081234567890" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Bukti Pembayaran</label>
                  <div class="col-md-8 col-lg-10">
                    <input type="file" name="gambar" class="form-control" required>
                  </div>
                </div>
              <?php } ?>
              <div class="text-center">
                <button class="btn btn-primary" type="submit" name="daftar">Daftar</button>
                <button class="btn btn-danger" onclick="window.history.back()">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once '../template/footer.php'; ?>