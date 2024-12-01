<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    session_start();
    # Database
    require_once("../../../database/koneksi.php");
    # Files Model
    require_once("../../../model/authentication.php");
    require_once("../../../model/message.php");
    $pesan = new model\message($koneksi);
    require_once("../../../model/pengguna.php");
    # Files Controller
    require_once("../../../controller/controller.php");
    $aunthentication = new controller\authen($koneksi);
    $pengguna = new controller\register($koneksi);

    if (!isset($_GET['aksi'])) {
    } else {
        switch ($_GET['aksi']) {
            case 'message':
                $pesan->message();
                break;

            case 'hapus':
                if (isset($_GET['hps'])) {
                    if (isset($_GET['id'])) {
                        $from = htmlspecialchars($_GET['id']);
                        $table = "tb_message";
                        $select = $koneksi->query("SELECT * FROM $table WHERE id_chat = '$from'");
                        $array = mysqli_fetch_array($select);

                        if ($array["FileUpload"] == "") {
                            $delete = "DELETE FROM $table WHERE id_chat = '$array[id_chat]'";
                            $data = $koneksi->query($delete);
                            if ($data != "") {
                                if ($data) {
                                    header("location:../ui/header.php?page=message");
                                    exit(0);
                                }
                            } else {
                                header("location:../ui/header.php?page=message");
                                exit(0);
                            }
                        } else {
                            unlink("../../../../assets/upload/$array[FileUpload]");
                            $data = $koneksi->query("DELETE FROM $table WHERE id_chat = '$array[id_chat]'");
                            if ($data != "") {
                                if ($data) {
                                    header("location:../ui/header.php?page=message");
                                    exit(0);
                                }
                            } else {
                                header("location:../ui/header.php?page=message");
                                exit(0);
                            }
                        }
                    }
                }
                break;

            case 'hapus2':
                if (isset($_GET['hpss'])) {
                    if (isset($_GET['id'])) {
                        $from = htmlspecialchars($_GET['id']);
                        $table = "tb_message";
                        $select = $koneksi->query("SELECT * FROM $table WHERE id_chat = '$from'");
                        $array = mysqli_fetch_array($select);

                        if ($array["FileUpload"] == "") {
                            $delete = "DELETE FROM $table WHERE id_chat = '$array[id_chat]'";
                            $data = $koneksi->query($delete);
                            if ($data != "") {
                                if ($data) {
                                    header("location:../ui/header.php?page=message");
                                    exit(0);
                                }
                            } else {
                                header("location:../ui/header.php?page=message");
                                exit(0);
                            }
                        } else {
                            unlink("../../../../assets/upload/$array[FileUpload]");
                            $data = $koneksi->query("DELETE FROM $table WHERE id_chat = '$array[id_chat]'");
                            if ($data != "") {
                                if ($data) {
                                    header("location:../ui/header.php?page=message");
                                    exit(0);
                                }
                            } else {
                                header("location:../ui/header.php?page=message");
                                exit(0);
                            }
                        }
                    }
                }
                break;

            default:
                break;
        }
    }

    # page
    if (!isset($_GET['page'])) {
    } else {
        switch ($_GET['page']) {
            case 'beranda':
                require_once("../dashboard/index.php");
                break;
            case 'message':
                require_once("../message/message.php");
                break;
            case 'buat-pesan':
                require_once("../message/new.php");
                break;
            case 'balas-pesan':
                require_once("../message/reply.php");
                break;
            case 'edit-pesan':
                require_once("../message/edit.php");
                break;
            case 'logout':
                if (isset($_SESSION['status'])) {
                    unset($_SESSION['status']);
                    session_unset();
                    session_destroy();
                    $_SESSION = array();
                }
                echo "<script>document.location.href = '../../index.php';</script>";
                exit(0);
                break;

            default:
                require_once("../../../controller/controller.php");
                break;
        }
    }

    # authentication verify
    if (isset($_SESSION['status'])) {
        if (isset($_SESSION['pengguna'])) {
            if (isset($_SESSION['username'])) {
                if (isset($_SESSION['user_level'])) {
                    if (isset($_COOKIE['cookies'])) {
                        if (isset($_SERVER['HTTPS'])) {
                            if (isset($_SERVER['REDIRECT_STATUS'])) {
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "<script lang='javascript'>
    window.setTimeout(() => {
        alert('Maaf anda gagal masuk ke halaman utama ...'),
        window.location.href='../../index.php'
    }, 3000);
    </script>";
        die;
        exit;
    }
    ?>
    <title>Dashboard Message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!--  -->
    <link href="<?= baseurl('dist/vendor/bootstrap-icons/bootstrap-icons.css') ?>" crossorigin="anonymous"
        rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/boxicons/css/boxicons.min.css') ?>" crossorigin="anonymous"
        rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/quill/quill.snow.css') ?>" crossorigin="anonymous" rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/quill/quill.bubble.css') ?>" crossorigin="anonymous" rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/remixicon/remixicon.css') ?>" crossorigin="anonymous" rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/simple-datatables/style.css') ?>" crossorigin="anonymous" rel="stylesheet">
    <link href="<?= baseurl('dist/css/style.css') ?>" crossorigin="anonymous" rel="stylesheet">
</head>

<body>