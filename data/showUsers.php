<?php

// session_start();
// if (!isset($_SESSION['login'])) {
//   header("Location: ../login.php");
// }

require_once '../main/function.php';

$table = 'users';
$show = showAllData($table);


require_once '../template/sidebar.php';

?>

<div class="pagetitle">
  <h1>Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Users</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard" style="margin-bottom: 15px;">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <div class="card shadow mb-4">
          <div class="card-body pb-5" style="margin-top: 20px;">
            <table class="table datatable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Email</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal lahir</th>
                  <th>No Wa</th>
                  <th>Pekerjaan</th>
                  <th>Instansi</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Gambar</th>
                  <th>Type</th>
                  <th>Aksi</th>
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
                    <td><?php echo $r["email"] ?></td>
                    <td><?php echo $r["nama"] ?></td>
                    <td><?php echo $r["jk_users"] ?></td>
                    <td><?php echo $r["tgl_lahir"] ?></td>
                    <td><?php echo $r["no_wa"] ?></td>
                    <td><?php echo $r["pekerjaan"] ?></td>
                    <td><?php echo $r["instansi"] ?></td>
                    <td><?php echo $r["alamat"] ?></td>
                    <td><?php echo $r["kota"] ?></td>
                    <td><img src="../gambar/<?php echo $r["gambar"] ?>" width="50"></td>
                    <td><?php echo $r["type"] ?></td>
                    <td>
                      <a class="btn btn-outline-primary" href="updateusers.php?id_users=<?php echo $r["id_users"] ?>">Ubah</a>
                      <a class="btn btn-outline-danger" href="deleteusers.php?id_users=<?php echo $r["id_users"] ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">Hapus</a>
                    </td>
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

<?php require_once '../template/footer.php';  ?>