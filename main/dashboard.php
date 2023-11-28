<?php

require_once '../main/function.php';
require_once '../template/sidebar.php';

$qtySelectPendaftaran = countSelectData(2);

?>

<div class="pagetitle d-flex justify-content-between">
  <div>
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>
  <div>
    <h1>Hi <?php echo $nama ?> &#x1F60A;</h1>
  </div>
</div><!-- End Page Title -->


<?php if ($test == "Admin") { ?>

    <!-- dashboard Admin -->

    <section class="section dashboard" style="margin-bottom: 70px;">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- banyak Peserta -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Banyak Peserta</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Banyak Pemateri -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Banyak Pemateri</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>165</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Pendapatan Workshop -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Pendapatan Workshop</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Workshop Belum dimulai -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Wokrshop Belum dimulai</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Workshop Sedang berlangsung -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Wokshop sedang berlangsung</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>165</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Workshop Selesai -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Workshop yang selesai</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Tabel Data Pendaftaran terbaru -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Pendaftaran Terakhir<span> | <a style="color: grey;" href="../data/showPendaftaran.php">show more</a></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pendaftar</th>
                        <th scope="col">Judul Workshop</th>
                        <th scope="col">Pemateri</th>
                        <th scope="col">Tanggal Daftar</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Status Pendaftaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $show = showAllPendaftaranSort();
                      $number = 1;
                      foreach ($show as $r) { ?>
                          <tr>
                            <td>
                              <?php
                              echo ($number++);
                              ?>
                            </td>
                            <td><?php echo $r["nama"] ?></td>
                            <td><?php echo $r["judul"] ?></td>
                            <td><?php echo $r["nama_pemateri"] ?></td>
                            <td><?php echo date("d M Y", strtotime($r["tgl_daftar"])) ?></td>
                            <td><?php echo date("d M Y", strtotime($r["tgl_bayar"])) ?></td>
                            <td><span class="badge bg-success"><?php echo $r["status_bayar"] ?></span></td>
                          </tr>
                      <?php }
                      ; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Table Workshop terbaru -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                <h5 class="card-title">Workshop Terbaru<span> | <a style="color: grey;" href="../data/showWorkshop.php">show more</a></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Workshop</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Pemateri</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Kuota</th>
                        <th scope="col">Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $show = showAllWorkshopSort();
                      $number = 1;
                      foreach ($show as $r) { ?>
                          <tr>
                            <td>
                              <?php
                              echo ($number++);
                              ?>
                            </td>
                            <td><?php echo $r["judul"] ?></td>
                            <td><?php echo $r["deskripsi"] ?></td>
                            <td><?php echo $r["nama_pemateri"] ?></td>
                            <td><?php echo date("d M Y", strtotime($r["tgl_mulai"])) ?></td>
                            <td><?php
                            $slot = countSelectData($r["id_workshop"]);
                            echo $slot . '/' . $r["kuota"] ?></td>
                            <td><?php if ($r["biaya"] == 0) {
                              echo 'GRATISSS';
                            } else {
                              echo "Rp. " . number_format($r["biaya"], 0, ",", ".");
                            } ?></td>
                          </tr>
                      <?php }
                      ; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->


          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

<?php } else { ?>

    <!-- dashboard Peserta -->

    <section class="section dashboard" style="margin-bottom: 70px;">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Workshop yang telah di daftarkan -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Workshop yang didaftar</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo $qtySelectPendaftaran ?> </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Workshop yang telah selesai -->
            <div class="col-xxl-6 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Workshop yang selesai</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Tabel Pendaftaran terakhir -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Pendaftaran Terakhir</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Workshop</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Pemateri</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Daftar</th>
                        <th scope="col">Status Pendaftaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $show = showSelectPendaftaranSort(2);
                      $number = 1;
                      foreach ($show as $r) { ?>
                          <tr>
                            <td>
                              <?php
                              echo ($number++);
                              ?>
                            </td>
                            <td><?php echo $r["judul"] ?></td>
                            <td><?php echo $r["deskripsi"] ?></td>
                            <td><?php echo $r["nama_pemateri"] ?></td>
                            <td><?php echo date("d M Y", strtotime($r["tgl_mulai"])) ?></td>
                            <td><?php echo date("d M Y", strtotime($r["tgl_daftar"])) ?></td>
                            <td><span class="badge bg-success"><?php echo $r["status_bayar"] ?></span></td>
                          </tr>
                      <?php }
                      ; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- tabel Workshop Terbaru -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Workshop Terbaru</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Workshop</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Pemateri</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Kuota</th>
                        <th scope="col">Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $show = showAllWorkshopSort();
                      $number = 1;
                      foreach ($show as $r) { ?>
                          <tr>
                            <td>
                              <?php
                              echo ($number++);
                              ?>
                            </td>
                            <td><?php echo $r["judul"] ?></td>
                            <td><?php echo $r["deskripsi"] ?></td>
                            <td><?php echo $r["nama_pemateri"] ?></td>
                            <td><?php echo date("d M Y", strtotime($r["tgl_mulai"])) ?></td>
                            <td><?php
                            $slot = countSelectData($r["id_workshop"]);
                            echo $slot . '/' . $r["kuota"] ?></td>
                            <td><?php if ($r["biaya"] == 0) {
                              echo 'GRATISSS';
                            } else {
                              echo "Rp. " . number_format($r["biaya"], 0, ",", ".");
                            } ?></td>
                          </tr>
                      <?php }
                      ; ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

<?php } ?>

<?php require_once '../template/footer.php'; ?>