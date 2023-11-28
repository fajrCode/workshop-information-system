<?php

require_once 'function.php';

//jangan lupa hapus, kalau session sudah dicopas k sini
setcookie('i', '10');
// ambil id di url

$table = "users";
$field = "id_users";
$isi_field = $_COOKIE['i']; //id users

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST['ubahData'])) {
  if (updateProfile($_POST) > 0) {
    echo '<script> function showAlert() {
      swal({icon: "success",
            text: "Yeay, Data changed successfully",
            showConfirmButton: false,
          }).then(function() {window.location.href = "profileUsers.php";});
      }
      showAlert();
      </script>';
  } else {
    echo '<script> function showAlert() {
            swal({icon: "error",
                  text: "Sorry, Data changed failed",
                  showConfirmButton: false,
                }).then(function() {window.location.href = "profileUsers.php";});
            }
            showAlert();
            </script>';
  }
}
if (isset($_POST['ubahPassword'])) {
  if (ubahPassword($_POST) > 0) {
    echo '<script> function showAlert() {
      swal({icon: "success",
            text: "Yeay, Password changed successfully",
            showConfirmButton: false,
          }).then(function() {window.location.href = "profileUsers.php";});
      }
      showAlert();
      </script>';
  } else {
    echo '<script> function showAlert() {
      swal({icon: "error",
            text: "Sorry, Password changed failed",
            showConfirmButton: false,
          }).then(function() {window.location.href = "profileUsers.php";});
      }
      showAlert();
      </script>';
  }
}

if (isset($_POST['ubahEmail'])) {
  if (ubahEmail($_POST) > 0) {
    echo '<script> function showAlert() {
      swal({icon: "success",
            text: "Yeay, Email changed successfully",
            showConfirmButton: false,
          }).then(function() {window.location.href = "profileUsers.php";});
      }
      showAlert();
      </script>';
  } else {
    echo '<script> function showAlert() {
      swal({icon: "error",
            text: "Sorry, Email changed failed",
            showConfirmButton: false,
          }).then(function() {window.location.href = "profileUsers.php";});
      }
      showAlert();
      </script>';
  }
}

require_once '../template/sidebar.php';

//query data users
$show = querySelect($table, $field, $isi_field)[0];


?>

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="../gambar/<?php echo $show["gambar"] ?>" alt="Profile" class="rounded-circle">
          <h2><?php echo $show["nama"] ?></h2> <!-- nama users -->
          <h3><?php echo $show["pekerjaan"] ?></h3> <!-- pekerjaan users -->
          <div class="social-links mt-2">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-email">Change Email</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Name</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["nama"] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Gender</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["jk_users"] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Date of Birth</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["tgl_lahir"] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Company</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["instansi"] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Job</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["pekerjaan"] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">City</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["kota"] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["alamat"] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["no_wa"] ?></div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8"><?php echo $show["email"] ?></div>
              </div>

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_users" value="<?php echo $show["id_users"] ?>">
                <input type="hidden" name="gambarLama" value="<?php echo $show["gambar"] ?>">

                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="../gambar/<?php echo $show["gambar"] ?>" alt="Profile">
                    <div class="pt-2">
                      <input name="gambar" class="form-control" type="file" id="formFile" title="Upload new profile image">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="nama" type="text" class="form-control" id="fullName" value="<?php echo $show["nama"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="instansi" type="text" class="form-control" id="company" value="<?php echo $show["instansi"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Gender</label>
                  <div class="col-md-8 col-lg-9">
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
                  <label for="inputDate" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $show["tgl_lahir"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="pekerjaan" type="text" class="form-control" id="Job" value="<?php echo $show["pekerjaan"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">City</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="kota" type="text" class="form-control" id="Country" value="<?php echo $show["kota"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="alamat" type="text" class="form-control" id="Address" value="<?php echo $show["alamat"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="no_wa" type="text" class="form-control" id="Phone" value="<?php echo $show["no_wa"] ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="email" type="email" class="form-control" id="Email" value="<?php echo $show["email"] ?>" disabled>
                  </div>
                </div>

                <div class="text-center">
                  <button name="ubahData" type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-email">
              <!-- Change Email Form -->
              <form action="" method="POST">

                <input type="hidden" name="id_users" value="<?php echo $show["id_users"] ?>">

                <div class="row mb-3">
                  <label for="newEmail" class="col-md-4 col-lg-3 col-form-label">New Email</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newEmail" type="email" class="form-control" id="newEmail">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="Password">
                  </div>
                </div>

                <div class="text-center">
                  <button name="ubahEmail" type="submit" class="btn btn-primary">Change Email</button>
                </div>
              </form><!-- End Change Email Form -->

            </div>

            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form action="" method="POST">

                <input type="hidden" name="id_users" value="<?php echo $show["id_users"] ?>">

                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button name="ubahPassword" type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->

            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

<?php require_once '../template/footer.php'; ?>