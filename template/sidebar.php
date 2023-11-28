<?php

require_once '../template/nav.php';

?>

<?php if ($test == "Admin") { ?>

    <!-- ======= Sidebar Admin ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/main/dashboard.php') {
                                echo 'nav-link';
                            } else {
                                echo 'nav-link collapsed';
                            } ?>" href="../main/dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Daftar</li>

            <li class="nav-item">
                <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/showUsers.php') {
                                echo 'nav-link';
                            } else {
                                echo 'nav-link collapsed';
                            } ?>" href="../data/showUsers.php">
                    <i class="bi bi-person"></i>
                    <span>Users</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/showPemateri.php') {
                                echo 'nav-link';
                            } else {
                                echo 'nav-link collapsed';
                            } ?>" href="../data/showPemateri.php">
                    <i class="bi bi-person"></i>
                    <span>Pemateri</span>
                </a>
            </li><!-- End Profile Page Nav -->


            <li class="nav-item">
                <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/showWorkshop.php') {
                                echo 'nav-link';
                            } else {
                                echo 'nav-link collapsed';
                            } ?>" href="../data/showWorkshop.php">
                    <i class="bi bi-file-earmark"></i>
                    <span>Workshop</span>
                </a>
            </li><!-- End Blank Page Nav -->

            <li class="nav-item">
                <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/showPendaftaran.php') {
                                echo 'nav-link';
                            } else {
                                echo 'nav-link collapsed';
                            } ?>" href="../data/showPendaftaran.php">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Pendaftaran</span>
                </a>
            </li><!-- End Login Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

    <?php } else { ?>

        <!-- ======= Sidebar Peserta ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/main/dashboard.php') {
                                    echo 'nav-link';
                                } else {
                                    echo 'nav-link collapsed';
                                } ?>" href="../main/dashboard.php">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/addPendaftaran.php') {
                                    echo 'nav-link';
                                } else {
                                    echo 'nav-link collapsed';
                                } ?>" href="../data/addPendaftaran.php">
                        <i class="bi bi-journal-text"></i>
                        <span>Daftar Workshop</span>
                    </a>
                </li><!-- End Daftar Workshop Page Nav -->

                <li class="nav-item">
                    <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/showPemateri.php') {
                                    echo 'nav-link';
                                } else {
                                    echo 'nav-link collapsed';
                                } ?>" href="../data/showPemateri.php">
                        <i class="bi bi-journal-text"></i>
                        <span>Daftar Pemateri</span>
                    </a>
                </li><!-- End Daftar Pemateri Page Nav -->

                <li class="nav-item">
                    <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/myWorkshop.php') {
                                    echo 'nav-link';
                                } else {
                                    echo 'nav-link collapsed';
                                } ?>" href="../data/myWorkshop.php">
                        <i class="bi bi-journal-text"></i>
                        <span>My Workshop</span>
                    </a>
                </li><!-- End My Workshop Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Histori</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/historyPendaftaran.php') {
                                                    echo 'nav-content';
                                                } elseif ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/historyPenyelesaian.php') {
                                                    echo 'nav-content';
                                                } else {
                                                    echo 'nav-content collapse ';
                                                } ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/historyPendaftaran.php') {
                                            echo 'nav-link';
                                        } else {
                                            echo 'nav-link collapsed';
                                        } ?>" href="../data/historyPendaftaran.php">
                                <i class="bi bi-circle"></i><span>Pendaftaran</span>
                            </a>
                        </li>
                        <li>
                            <a class="<?php if ($_SERVER['REQUEST_URI'] == '/Pemograman%20web/Kuliah/Pemograman%20WEB%20II/Lintas%20Prodi%20WEB%20I/UTS%20Syalalala/data/historyPenyelesaian.php') {
                                            echo 'nav-link';
                                        } else {
                                            echo 'nav-link collapsed';
                                        } ?>" href="../data/historyPenyelesaian.php">
                                <i class="bi bi-circle"></i><span>Penyelesaian</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Histori Nav -->
            </ul>

        </aside>
        <!-- End Sidebar-->

        <main id="main" class="main" style="margin-bottom: 75px;">
        <?php } ?>