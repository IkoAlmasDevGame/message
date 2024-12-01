<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Message - Pesan baru -</title>
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
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=buat-pesan" aria-current="page"
                            class="text-decoration-none text-primary">membuat pesan baru</a>
                    </li>
                </div>
            </div>
            <div class="py-3 zn-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-4">
                        <h4 class="card-title fs-4 fw-normal text-center">Pesan Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="col-sm-8 col-md-8">
                                <div class="card bg-secondary my-1 py-2">
                                    <div class="card-body">
                                        <form action="?aksi=message" enctype="multipart/form-data" method="post">
                                            <?php if (isset($_SESSION['email'])): ?>
                                                <div class="form-group">
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <label for="" class="label label-default 
                                                                fs-3 text-start text-light">From</label>
                                                        </div>
                                                        <div class="col-sm-7 col-md-7">
                                                            <input type="email" name="toFrom" class="form-control"
                                                                value="<?= $_SESSION['email'] ?>" readonly
                                                                placeholder="Masukkan Email anda ..." required>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <label for="" class="label label-default 
                                                                fs-3 text-start text-light">To</label>
                                                        </div>
                                                        <div class="col-sm-7 col-md-7">
                                                            <input type="email" name="toTo" class="form-control"
                                                                value="" placeholder="Masukkan Email tujuan ...">
                                                        </div>
                                                    </div>
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <label for="" class="label label-default 
                                                                fs-3 text-start text-light">Subject</label>
                                                        </div>
                                                        <div class="col-sm-7 col-md-7">
                                                            <input type="text" name="toSubject" class="form-control"
                                                                placeholder="Masukkan subject baru anda ....">
                                                        </div>
                                                    </div>
                                                    <div class="form-inline row justify-content-center
                                                         align-items-start flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <label for="" class="label label-default 
                                                                fs-3 text-start text-light">Message</label>
                                                        </div>
                                                        <div class="col-sm-7 col-md-7">
                                                            <textarea name="toMessage" rows="6" class="form-control"
                                                                placeholder="Ketikkan pesan anda disini ..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <label for="" class="label label-default 
                                                                fs-3 text-start text-light">File Upload</label>
                                                        </div>
                                                        <div class="col-sm-7 col-md-7">
                                                            <input type="file"
                                                                accept=".jpg, .png, .jpeg, .jfif, .docx, .xlsx, .mp3, .mp4, .zip"
                                                                name="FileUpload" class="form-control-file form-control"
                                                                id="" multiple>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <button type="submit" name="kirim" class="btn btn-primary">
                                                            <i class="bi bi-send-fill fa-1x"></i>
                                                            <span>Kirim pesan</span>
                                                        </button>
                                                        <a href="?page=message" aria-current="page"
                                                            class="btn btn-default btn-outline-dark">Kembali</a>
                                                        <button type="reset" class="btn btn-danger">
                                                            <i class="bi bi-eraser-fill fa-1x"></i>
                                                            <span>Hapus pesan</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("../ui/footer.php") ?>