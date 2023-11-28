<?php
require_once '../main/function.php';

// ambil id di url
$table = "users";
$field = "id_users";
$isi_field = $_GET['id_users'];

//query data users
$show = querySelect($table, $field, $isi_field)[0];

if (isset($_POST['batal'])) {
  header('Location: showUsers.php');
  exit;
}

require_once '../template/sidebar.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['submit'])) {
  if (updateusers($_POST) > 0) {
    echo "<script>
            alertSuccesGo('Selamat, data berhasil diubah','showUsers.php')
          </script>";
  } else {
    echo "<script>
            alertFailGo('maaf, data gagal diubah, silahkan cek dan ulangi kembali', 'updateUsers.php?id_users=$isi_field')
          </script>";
  }
}

?>

<section class="section profile" style="margin-bottom: 70px;">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body pt-1">
          <h5 class="card-title">Update Data Users</h5>
          <div class="tab-content pt-2">

            <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id_users" value="<?php echo $show["id_users"] ?>">
              <input type="hidden" name="gambarLama" value="<?php echo $show["gambar"] ?>">
              <ul>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-10">
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo $show["email"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">password</label>
                  <div class="col-md-8 col-lg-10">
                    <input class="form-control" type="password" name="password" id="pw" value="<?php echo $show["password"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Nama Users</label>
                  <div class="col-md-8 col-lg-10">
                    <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $show["nama"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-md-8 col-lg-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk_users" id="gridRadios1" value="Laki-Laki" <?= $show['jk_users'] == 'Laki-laki' ? 'checked' : "" ?>>
                      <label class="form-check-label" for="gridRadios1">
                        Laki-Laki
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jk_users" id="gridRadios2" value="Perempuan" <?= $show['jk_users'] == 'Perempuan' ? 'checked' : "" ?>>
                      <label class="form-check-label" for="gridRadios2">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-md-2 col-lg-3">
                    <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $show["tgl_lahir"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">No WhatsApps</label>
                  <div class="col-md-8 col-lg-10">
                    <input class="form-control" type="text" name="no_wa" id="no_wa" value="<?php echo $show["no_wa"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Pekerjaan</label>
                  <div class="col-md-8 col-lg-10">
                    <input class="form-control" type="text" name="pekerjaan" id="pekerjaan" value="<?php echo $show["pekerjaan"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Instansi</label>
                  <div class="col-md-8 col-lg-10">
                    <input class="form-control" type="text" name="instansi" id="instansi" value="<?php echo $show["instansi"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Alamat</label>
                  <div class="col-md-8 col-lg-10">
                    <input class="form-control" type="text" name="alamat" id="alamat" value="<?php echo $show["alamat"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-3 col-lg-2 col-form-label">Kota</label>
                  <div class="col-md-8 col-lg-10">
                    <input class="form-control" type="text" name="kota" id="kota" value="<?php echo $show["kota"] ?>">
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
                  <label class="col-md-3 col-lg-2 col-form-label">Type Users</label>
                  <div class="col-md-1 col-lg-1">
                    <input class="form-control" type="text" name="type" id="type" value="<?php echo $show["type"] ?>">
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