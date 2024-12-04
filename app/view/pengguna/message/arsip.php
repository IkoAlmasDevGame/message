<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Message - Pesan -</title>
    <?php
    if ($_SESSION['user_level'] == "pengguna") {
        require_once("../ui/header.php");
    } else {
        echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
        die;
    }
    ?>
</head>

<body>
    <?php require_once("../ui/sidebar.php") ?>
    <div class="panel panel-default bg-body-tertiary">
        <div class="panel-body container-fluid bg-body-secondary py-3 rounded-2">
            <div class="panel-heading">
                <h4 class="panel-title display-4 fs-4 fst-normal fw-normal">Arsip - Message -</h4>
                <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page"
                            class="text-decoration-none text-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=message" aria-current="page"
                            class="text-decoration-none text-primary">Dashboard Pesan</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=arsip-pesan" aria-current="page"
                            class="text-decoration-none text-primary">Arsip Pesan</a>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("../ui/footer.php") ?>