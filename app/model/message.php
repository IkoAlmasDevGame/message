<?php

namespace model;

class message
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    # <--=== pengguna dan admin ===--->
    # start code model message
    public function message()
    {
        if (isset($_POST['balas'])) {
            $from = htmlspecialchars($_POST['toFrom']);
            $to = htmlspecialchars($_POST['toTo']);
            $subject = htmlspecialchars($_POST['toSubject']);
            $message = htmlspecialchars($_POST['toMessage']);

            /*/ Input File Foto /*/
            # Input File Foto
            $ekstensi_diperbolehkan_file = array('mp3', 'mp4', 'jpg', 'jpeg', 'jfif', 'png', 'docx', 'xlsx', 'zip');
            $file = htmlentities($_FILES['FileUpload']['name']) ? htmlspecialchars($_FILES['FileUpload']['name']) : $_FILES['FileUpload']['name'];
            $x_file = explode('.', $file);
            $ekstensi_file = strtolower(end($x_file));
            $ukuran_file = $_FILES['FileUpload']['size'];
            $file_tmp_file = $_FILES['FileUpload']['tmp_name'];

            if (in_array($ekstensi_file, $ekstensi_diperbolehkan_file) === true) {
                if ($ukuran_file < 10440070) {
                    move_uploaded_file($file_tmp_file, "../../../../assets/upload/" . $file);
                } else {
                    echo "Tidak Dapat Ter - Upload Size Gambar";
                    exit;
                }
            } else {
                $this->db->query("INSERT INTO tb_message SET toFrom='$from', toTo='$to', toSubject='$subject', toMessage='$message'");
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }
            # Input File Foto
            /*/ Input File Foto /*/

            if ($from == "" || $to == "" || $subject == "" || $message == "") {
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }

            $table = "tb_message";
            $SQLbalas = "INSERT INTO tb_message SET toFrom='$from', toTo='$to', toSubject='$subject', toMessage='$message', FileUpload='$file'";
            $balas = $this->db->query($SQLbalas);
            if ($balas != "") {
                if ($balas) {
                    echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                    die;
                }
            } else {
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }
        } elseif (isset($_POST['kirim'])) {
            $from = htmlspecialchars($_POST['toFrom']);
            $to = htmlspecialchars($_POST['toTo']);
            $subject = htmlspecialchars($_POST['toSubject']);
            $message = htmlspecialchars($_POST['toMessage']);

            /*/ Input File Foto /*/
            # Input File Foto
            $ekstensi_diperbolehkan_file = array('mp3', 'mp4', 'jpg', 'jpeg', 'jfif', 'png', 'docx', 'xlsx', 'zip');
            $file = htmlentities($_FILES['FileUpload']['name']) ? htmlspecialchars($_FILES['FileUpload']['name']) : $_FILES['FileUpload']['name'];
            $x_file = explode('.', $file);
            $ekstensi_file = strtolower(end($x_file));
            $ukuran_file = $_FILES['FileUpload']['size'];
            $file_tmp_file = $_FILES['FileUpload']['tmp_name'];

            if (in_array($ekstensi_file, $ekstensi_diperbolehkan_file) === true) {
                if ($ukuran_file < 10440070) {
                    move_uploaded_file($file_tmp_file, "../../../../assets/upload/" . $file);
                } else {
                    echo "Tidak Dapat Ter - Upload Size Gambar";
                    exit;
                }
            } else {
                $this->db->query("INSERT INTO tb_message SET toFrom='$from', toTo='$to', toSubject='$subject', toMessage='$message'");
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }
            # Input File Foto
            /*/ Input File Foto /*/

            if ($from == "" || $to == "" || $subject == "" || $message == "") {
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }

            $table = "tb_message";
            $SQLKirim = "INSERT INTO $table SET toFrom='$from', toTo='$to', toSubject='$subject', toMessage='$message', FileUpload='$file'";
            $kirim = $this->db->query($SQLKirim);
            if ($kirim != "") {
                if ($kirim) {
                    echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                    die;
                }
            } else {
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }
        } elseif (isset($_POST['edit'])) {
            $id = htmlspecialchars($_POST['id']);
            $from = htmlspecialchars($_POST['toFrom']);
            $to = htmlspecialchars($_POST['toTo']);
            $subject = htmlspecialchars($_POST['toSubject']);
            $message = htmlspecialchars($_POST['toMessage']);

            /*/ Input File Foto /*/
            # Input File Foto
            $ekstensi_diperbolehkan_file = array('mp3', 'mp4', 'jpg', 'jpeg', 'jfif', 'png', 'docx', 'xlsx', 'zip');
            $file = htmlentities($_FILES['FileUploadbaru']['name']) ? htmlspecialchars($_FILES['FileUploadbaru']['name']) : $_FILES['FileUploadbaru']['name'];
            $x_file = explode('.', $file);
            $ekstensi_file = strtolower(end($x_file));
            $ukuran_file = $_FILES['FileUploadbaru']['size'];
            $file_tmp_file = $_FILES['FileUploadbaru']['tmp_name'];

            if (in_array($ekstensi_file, $ekstensi_diperbolehkan_file) === true) {
                if ($ukuran_file < 10440070) {
                    move_uploaded_file($file_tmp_file, "../../../../assets/upload/" . $file);
                } else {
                    echo "Tidak Dapat Ter - Upload Size Gambar";
                    exit;
                }
            } else {
                $this->db->query("INSERT INTO tb_message SET toFrom='$from', toTo='$to', toSubject='$subject', toMessage='$message' WHERE id_chat = '$id'");
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }
            # Input File Foto
            /*/ Input File Foto /*/

            $filelama = htmlspecialchars($_POST['FileUpload']);
            if ($filelama) {
                unlink("../../../../assets/upload/$filelama");
            }

            if ($from == "" || $to == "" || $subject == "" || $message == "") {
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }

            $table = "tb_message";
            $SQLedit = "UPDATE $table SET toFrom = '$from', toTo = '$to', toSubject = '$subject', toMessage = '$message', FileUpload='$file' where id_chat = '$id'";
            $edit = $this->db->query($SQLedit);
            if ($edit != "") {
                if ($edit) {
                    echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                    die;
                }
            } else {
                echo "<script>document.location.href = '../ui/header.php?page=message';</script>";
                die;
            }
        }
    }

    # finish code model message
    # <--=== pengguna dan admin ===--->
    public function editpesan($SQL)
    {
        $query = $this->db->query($SQL);
        return $query;
    }

    public function balaspesan($SQL)
    {
        $query = $this->db->query($SQL);
        return $query;
    }

    public function pesanmasuk($SQL)
    {
        $query = $this->db->query($SQL);
        return $query;
    }

    public function pesankeluar($SQL)
    {
        $query = $this->db->query($SQL);
        return $query;
    }
}
