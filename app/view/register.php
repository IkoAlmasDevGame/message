<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>register akun</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            media="all">
        <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman';
            font-weight: 300;
            font-size: 16px;
            font-style: normal;
        }

        body {
            background: rgba(125, 144, 133, 0.722);
        }

        .card {
            width: 550px;
        }

        @media (max-width:720px) {
            .card {
                max-width: 100%;
            }
        }
        </style>
    </head>

    <body onload="startTime()">
        <!-- === Layout Dashboard -->
        <div class="navbar navbar-expand-lg bg-body-secondary position-sticky sticky-sm-bottom">
            <div class="container-fluid">
                <a href="../view/register.php" class="navbar-brand fs-6 text-start text-dark">Dashboard Message</a>
                <button class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#navbarSupportNavigation'>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <!-- === Body Layout -->
        <div class="container-fluid mt-4 pt-5">
            <div class="d-flex justify-content-center align-items-center flex-wrap mt-1 pt-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title text-center">- Register Akun Message -</h4>
                    </div>
                    <div class="card-body mt-1">
                        <!-- Layout Form -->
                        <?php
                    # code model and controller
                    require_once("../database/koneksi.php");
                    require_once("../model/pengguna.php");
                    require_once("../controller/controller.php");
                    $membuat = new controller\register($koneksi);
                    if (!isset($_GET['aksi'])) {
                    } else {
                        switch ($_GET['aksi']) {
                            case 'simpan':
                                $membuat->create();
                                break;

                            default:
                                require_once("../controller/controller.php");
                                break;
                        }
                    }
                    ?>
                        <form action="?aksi=simpan" method="post">
                            <div class="form-group">
                                <div class="form-inline row justify-content-center
                                     align-items-center flex-wrap mb-1 mt-1">
                                    <div class="form-label col-sm-2 col-md-3">
                                        <label for="user" class="label label-default">Username Input</label>
                                    </div>
                                    <div class="col-sm-8 col-md-9">
                                        <input type="text" name="username" maxlength="100" aria-required="TRUE"
                                            class="form-control" placeholder="masukkan username baru anda ..."
                                            id="user">
                                    </div>
                                </div>
                                <div class="form-inline row justify-content-center
                                     align-items-center flex-wrap mb-1 mt-1">
                                    <div class="form-label col-sm-2 col-md-3">
                                        <label for="email" class="label label-default">Email Input</label>
                                    </div>
                                    <div class="col-sm-8 col-md-9">
                                        <input type="email" name="email" maxlength="255" aria-required="TRUE"
                                            class="form-control" placeholder="masukkan email baru anda ..." id="email">
                                    </div>
                                </div>
                                <div class="form-inline row justify-content-center
                                 align-items-center flex-wrap mb-1 mt-1">
                                    <div class="form-label col-sm-2 col-md-3">
                                        <label for="pass" class="label label-default">Kata Sandi</label>
                                    </div>
                                    <div class="col-sm-8 col-md-9">
                                        <input type="password" name="password" maxlength="255" aria-required="TRUE"
                                            class="form-control" placeholder="masukkan kata sandi anda ..." id="pass">
                                    </div>
                                </div>
                                <div class="form-inline row justify-content-center
                                 align-items-center flex-wrap mb-1 mt-1">
                                    <div class="form-label col-sm-2 col-md-3">
                                        <label for="telepon" class="label label-default">Nomer Telepon</label>
                                    </div>
                                    <div class="col-sm-8 col-md-9">
                                        <input type="text" name="telepon" maxlength="16" inputmode="numeric"
                                            aria-required="TRUE" class="form-control"
                                            placeholder="masukkan nomer telepon anda ..." id="telepon">
                                    </div>
                                </div>
                                <div class="form-inline row justify-content-center
                                 align-items-center flex-wrap mb-1 mt-1">
                                    <div class="form-label col-sm-2 col-md-3">
                                        <label for="tanggal" class="label label-default">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-sm-8 col-md-9">
                                        <input type="date" name="tgl_lahir" aria-required="TRUE"
                                            class="form-control date-formate"
                                            placeholder="masukkan Tanggal Lahir anda ..." id="tanggal">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer m-1">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-outline-light">
                                        <i class="fa fa-save fa-1x"></i>
                                        <span>Simpan</span>
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-outline-light">
                                        <i class="fa fa-eraser fa-1x"></i>
                                        <span>Hapus</span>
                                    </button>
                                    <p class="text-dark fs-6 fw-normal">Apakah anda sudah mempunyai akun,
                                        <a href="../view/index.php" aria-current="page"
                                            class="text-decoration-underline text-primary">Login</a>
                                    </p>
                                </div>
                                <div class="container-fluid mt-4 p-1">
                                    <footer class="footer">
                                        <p id="year" class="text-center"></p>
                                    </footer>
                                </div>
                            </div>
                        </form>
                        <!-- Layout Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- === Body Layout -->
        <!-- === Layout Dashboard -->
        <script crossorigin="anonymous" lang="javascript"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script crossorigin="anonymous" lang="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
        <script crossorigin="anonymous" lang="javascript"
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <!-- === Layout Script -->
        <script type="text/javascript">
        function startTime() {
            var day = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];
            var today = new Date();
            var h = today.getHours();
            var tahun = today.getFullYear();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('year').innerHTML =
                "&copy Register Message " + tahun + "<br>" + day[today.getDay()] + ", " + h +
                " : " +
                m +
                " : " + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
        </script>
        <!-- === Layout Script -->
    </body>

</html>