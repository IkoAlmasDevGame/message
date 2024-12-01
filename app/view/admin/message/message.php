<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Message - Pesan -</title>
        <?php
    if ($_SESSION['user_level'] == "admin") {
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
                    <h4 class="panel-title display-4 fs-4 fst-normal fw-normal">Pesan - Message -</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=message&email=<?= $_SESSION['email'] ?>" aria-current="page"
                                class="text-decoration-none text-primary">Dashboard Pesan</a>
                        </li>
                    </div>
                </div>
                <div class="py-2 zn-1">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="card-title fst-normal fw-normal fs-4 text-dark">Data Message</h4>
                            <div class="text-start">
                                <a href="?page=message" class="btn btn-warning">
                                    <i class="fa fa-refresh"></i>
                                    <span>refresh halaman</span>
                                </a>
                                <a href="?page=message&keluar=yes" class="btn btn-danger">
                                    <i class="fa fa-envelope-open"></i>
                                    <span>Pesan Keluar</span>
                                </a>
                            </div>
                            <br>
                            <div class="text-start">
                                <a href="?page=buat-pesan" aria-current="page" class="btn btn-light btn-outline-danger">
                                    <i class="fa fa-envelope fa-1x"></i>
                                    <i class="fa fa-pen-alt fa-1x"></i>
                                    <span>membuat pesan baru</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <div class="d-table w-100">
                                        <?php error_reporting(0); ?>
                                        <?php if (!empty($_GET['keluar'] == "yes")): ?>
                                        <table class="table table-striped-columns" id="datatable2"
                                            style="width: 900px; min-width: 100%;">
                                            <thead class="table-head-fixed">
                                                <tr>
                                                    <th class="text-center fw-normal">No</th>
                                                    <th class="text-center fw-normal">Email dari</th>
                                                    <th class="text-center fw-normal">Email kepada</th>
                                                    <th class="text-center fw-normal">Subject</th>
                                                    <th class="text-center fw-normal"
                                                        style="width: 200px; max-width:100%;">Pesan</th>
                                                    <th class="text-center fw-normal">File Upload</th>
                                                    <th class="text-center fw-normal"
                                                        style="width: 100px; max-width:100%;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_SESSION['email'])) {
                                                    $no = 1;
                                                    $email = $_SESSION['email'];
                                                    $query = $pesan->pesankeluar("SELECT * FROM tb_message WHERE toFrom = '$email' order by toFrom desc");
                                                    while ($pesan = $query->fetch_array()) {
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td class="text-center"><?php echo $pesan['toFrom'] ?></td>
                                                    <td class="text-center"><?php echo $pesan['toTo'] ?></td>
                                                    <td class="text-center"><?php echo $pesan['toSubject'] ?></td>
                                                    <td class="text-center">
                                                        <textarea style="min-width: 100%; width:250px;" required
                                                            readonly><?php echo $pesan['toMessage'] ?></textarea>
                                                    </td>
                                                    <?php if ($pesan['FileUpload']): ?>
                                                    <td class="text-center">
                                                        <a href="../../../../assets/upload/<?= $pesan['FileUpload'] ?>"
                                                            download="<?= $pesan['FileUpload'] ?>"
                                                            <?php move_uploaded_file("../../../../assets/upload/" . $pesan['FileUpload'], "../../../../assets/download/" . $pesan['FileUpload']) ?>
                                                            class="btn btn-light btn-outline-dark">
                                                            <i class="fa fa-download fa-1x"></i>
                                                        </a>
                                                    </td>
                                                    <?php else: ?>
                                                    <td class="text-center">
                                                        <p>Tidak ada File</p>
                                                    </td>
                                                    <?php endif ?>
                                                    <td class="text-center">
                                                        <a href="?page=edit-pesan&id=<?= $pesan['id_chat'] ?>"
                                                            title="edit pesan" aria-current="page"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-edit"></i>
                                                            <span title="edit pesan"></span>
                                                        </a>
                                                        <a href="?aksi=hapus2&hpss=yes&id=<?= $isi['id_chat'] ?>"
                                                            onclick="javascript:return confirm('Apakah kamu ingin menghapus pesan ini ?')"
                                                            title="Hapus pesan" aria-current="page"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                            <span title="Hapus pesan"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php else: ?>
                                        <table class="table table-striped-columns" id="datatable2"
                                            style="width: 900px; min-width: 100%;">
                                            <thead class="table-head-fixed">
                                                <tr>
                                                    <th class="text-center fw-normal">No</th>
                                                    <th class="text-center fw-normal">Email kepada</th>
                                                    <th class="text-center fw-normal">Subject</th>
                                                    <th class="text-center fw-normal"
                                                        style="width: 200px; max-width:100%;">Pesan</th>
                                                    <th class="text-center fw-normal">File Upload</th>
                                                    <th class="text-center fw-normal"
                                                        style="width: 100px; max-width:100%;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_SESSION['email'])) {
                                                    $no = 1;
                                                    $email = $_SESSION['email'];
                                                    $query = $pesan->pesanmasuk("SELECT * FROM tb_message WHERE toTo = '$email' order by toTo desc");
                                                    while ($isi = $query->fetch_array()) {
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no++; ?></td>
                                                    <td class="text-center"><?php echo $isi['toFrom'] ?></td>
                                                    <td class="text-center"><?php echo $isi['toSubject'] ?></td>
                                                    <td class="text-center">
                                                        <textarea style="min-width: 100%; width:250px;" required
                                                            readonly><?php echo $isi['toMessage'] ?></textarea>
                                                    </td>
                                                    <?php if ($isi['FileUpload']): ?>
                                                    <td class="text-center">
                                                        <a href="../../../../assets/upload/<?= $isi['FileUpload'] ?>"
                                                            download="<?= $isi['FileUpload'] ?>"
                                                            <?php move_uploaded_file("../../../../assets/upload/" . $isi['FileUpload'], "../../../../assets/download/" . $isi['FileUpload']) ?>
                                                            class="btn btn-light btn-outline-dark">
                                                            <i class="fa fa-download fa-1x"></i>
                                                        </a>
                                                    </td>
                                                    <?php else: ?>
                                                    <td class="text-center">
                                                        <p>Tidak ada File</p>
                                                    </td>
                                                    <?php endif ?>
                                                    <td class="text-center">
                                                        <a href="?page=balas-pesan&id=<?= $isi['id_chat'] ?>"
                                                            title="Balas pesan" aria-current="page"
                                                            class="btn btn-secondary">
                                                            <i class="fa fa-paper-plane"></i>
                                                            <span title="Balas pesan"></span>
                                                        </a>
                                                        <a href="?aksi=message&email=<?= $_SESSION['email'] ?>"
                                                            onclick="javascript:return confirm('Apakah kamu ingin menghapus pesan ini ?')"
                                                            title="Hapus pesan" aria-current="page"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                            <span title="Hapus pesan"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>