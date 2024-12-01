<?php

namespace model;

class pengguna
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function membuat($username, $email, $password, $telepon, $tgl_lahir)
    {
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['telepon']) || empty($_POST['tgl_lahir'])) {
            echo "";
            die;
        } else {
            $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : strip_tags($_POST['username']);
            $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : strip_tags($_POST['email']);
            $password = htmlspecialchars(md5($_POST['password'], false));
            $telepon = htmlentities($_POST['telepon']) ? htmlspecialchars($_POST['telepon']) : strip_tags($_POST['telepon']);
            $tgl_lahir = htmlentities($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir']) : strip_tags($_POST['tgl_lahir']);
            # data table
            $table = "tb_pengguna";
            $SQL = "SELECT * FROM $table WHERE username = '$username' and email = '$email' order by username desc";
            $data = $this->db->query($SQL);
            $cek = mysqli_num_rows($data);

            # data username ketika ada yang sama.
            if ($cek) {
                echo "<script>document.location.href = '../view/register.php'; alert('username dan email anda sudah ada yang pakai, coba ganti username, dan email anda.');</script>";
                die;
            } else {
                $SQLInsert = "INSERT INTO $table SET username='$username', email='$email', password='$password', telepon='$telepon', tgl_lahir='$tgl_lahir', user_level = 'pengguna'";
                $insert = $this->db->query($SQLInsert);
                if ($insert != "") {
                    if ($insert) {
                        echo "<script>document.location.href = '../view/index.php'; alert('selamat anda sudah berhasil membuat akun.');</script>";
                        die;
                    }
                } else {
                    echo "<script>document.location.href = '../view/register.php'; alert('anda gagal membuat akun.');</script>";
                    die;
                }
            }
        }
    }
    public function mengedit($id, $username, $email, $password, $telepon, $tgl_lahir) {}
}
