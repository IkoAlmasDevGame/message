<?php
if ($_SESSION['user_level'] == "") {
    echo "<script>document.location.href = '../../index.php';</script>";
    die;
}
?>

<?php
if ($_SESSION['user_level'] == "pengguna") {
?>
    <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" role="button" class="logo d-flex align-items-center fs-5 fst-normal fw-semibold">
                <?php echo "Dashboard Message"; ?>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
            <?php
            // setting tanggal
            $haries = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jum'at", "Saturday" => "Sabtu");
            $bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $bulans_count = count($bulans);
            // tanggal bulan dan tahun hari ini
            $hari_ini = $haries[date("l")];
            $bulan_ini = $bulans[date("n")];
            $tanggal = date("d");
            $bulan = date("m");
            $tahun = date("Y");
            ?>
            &nbsp;<?php echo $hari_ini . ", " . $tanggal . " " . $bulan_ini . " " . $tahun ?>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto mx-3">
            <ul>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-controls="dropdown">
                        <?php $baseFile = mysqli_fetch_array($koneksi->query("SELECT * FROM tb_pengguna WHERE id = '$_SESSION[pengguna]'")); ?>
                        <i class="fa fa-2x fa-user-circle"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <hr class="dropdown-divider">
                            <div class="form-inline row justify-content-start align-items-start flex-wrap">
                                <div class="form-label col-sm-3 col-md-3">
                                    <label for="" class="form-label label-default">username</label>
                                </div>
                                <div class="col-sm-3 col-md-3">:</div>
                                <div class="col-sm-3 col-md-3">
                                    <?php echo $baseFile['username'] ?>
                                </div>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="form-inline row justify-content-start align-items-start flex-wrap">
                                <div class="form-label col-sm-3 col-md-3">
                                    <label for="" class="form-label label-default">Level</label>
                                </div>
                                <div class="col-sm-3 col-md-3">:</div>
                                <div class="col-sm-3 col-md-3">
                                    <?php echo $baseFile['user_level'] ?>
                                </div>
                            </div>
                            <hr class="dropdown-divider">
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    <!-- ======= Header ======= -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a href="?page=beranda" aria-current="page" class="nav-link collapsed">
                    <i class="fa fa-home fa-1x"></i>
                    <span class="fs-4 display-4 text-dark fw-normal">Dashboard</span>
                </a>
            </li>
            <hr class="dropdown-divider border border-top border-1">
            <div class="my-1"></div>
            <!-- Dropdow Sidebar -->
            <li class="nav-item">
                <a href="?page=message" aria-current="page" class="nav-link collapsed">
                    <i class="fa fa-envelope fa-1x"></i>
                    <span class="fs-4 display-4 text-dark fw-normal">Pesan</span>
                </a>
            </li>
            <!-- Dropdow Sidebar -->
            <div class="my-1"></div>
            <hr class="dropdown-divider border border-top border-1">
            <li class="nav-item">
                <a href="?page=logout" onclick="return confirm('Apakah ingin keluar dari website ini ?')"
                    aria-current="page" class="nav-link collapsed">
                    <i class="fa fa-sign-out-alt fa-1x has-icon"></i>
                    <span class="fs-4 display-4 text-danger fw-normal">Log out</span>
                </a>
            </li>
        </ul>
    </aside>
    <!-- ======= Sidebar ======= -->
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                    </div>

                </div><!-- End Right side columns -->

            </div>
        </section>
    <?php
} else {
    echo "<script>document.location.href = '../../ux/index.php';</script>";
    die;
}
    ?>