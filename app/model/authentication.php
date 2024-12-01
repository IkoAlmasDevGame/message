<?php

namespace model;

class Authentication
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function admin($userInputs, $passInputs)
    {
        session_start();
        if (empty($_POST['userInput']) || empty($_POST['password'])) {
            echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=401';</script>";
            die;
        } else {
            $userInputs = htmlspecialchars($_POST['userInput']);
            $passInputs = htmlspecialchars(md5($_POST['password'], false));
            password_verify($passInputs, PASSWORD_DEFAULT);
            # database login pengguna
            $table = "tb_admin";
            $SQLz = "SELECT * FROM $table WHERE username = '$userInputs' and password = '$passInputs' || email = '$userInputs' and password = '$passInputs'";
            $Queryz = $this->db->query($SQLz);
            $cek = mysqli_num_rows($Queryz);
            # cek userInput
            $hasil = $_POST['angka1'] + $_POST['angka2'];
            if ($cek > 0) {
                $response = array($userInputs, $passInputs);
                $response[$table] = array($userInputs, $passInputs);
                if ($row = $Queryz->fetch_assoc()) {
                    if ($row['user_level'] == "admin") {
                        $_SESSION['admin'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['user_level'] = "admin";
                        if ($_POST['hasil'] == $hasil) {
                            $_SESSION['status'] = true;
                            echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=200';</script>";
                            die;
                        } else {
                            $_SESSION['status'] = false;
                            echo "<script>document.location.href = 'index.php';</script>";
                            die;
                        }
                    }
                    $_COOKIE['cookies'] = $userInputs;
                    $_SERVER['HTTPS'] = "on";
                    $HttpStatus = $_SERVER["REDIRECT_STATUS"];
                    if ($HttpStatus == 400) {
                        echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=400';</script>";
                        die;
                    }
                    if ($HttpStatus == 403) {
                        echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=403';</script>";
                        die;
                    }
                    if ($HttpStatus == 500) {
                        echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=500';</script>";
                        die;
                    }
                    setcookie($response[$table], $row, time() + (86400 * 30), "/");
                    array_push($response[$table], $row);
                    die;
                    exit;
                }
            } else {
                unset($_POST['hasil']);
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../index.php';</script>";
                die;
            }
        }
    }

    public function pengguna($userInput, $passInput)
    {
        session_start();
        if (empty($_POST['userInput']) || empty($_POST['password'])) {
            echo "<script>document.location.href = '../view/error/error-msg.php?HttpStatus=401';</script>";
            die;
        } else {
            $userInput = htmlspecialchars($_POST['userInput']);
            $passInput = htmlspecialchars(md5($_POST['password'], false));
            password_verify($passInput, PASSWORD_DEFAULT);
            # database login pengguna
            $table = "tb_pengguna";
            $SQLp = "SELECT * FROM $table WHERE username = '$userInput' and password = '$passInput' || email = '$userInput' and password = '$passInput'";
            $Queryp = $this->db->query($SQLp);
            $cek = mysqli_num_rows($Queryp);
            # cek userInput
            $hasil = $_POST['angka1'] + $_POST['angka2'];
            if ($cek > 0) {
                $response = array($userInput, $passInput);
                $response[$table] = array($userInput, $passInput);
                if ($row = $Queryp->fetch_assoc()) {
                    if ($row['user_level'] == "pengguna") {
                        $_SESSION['pengguna'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['user_level'] = "pengguna";
                        if ($_POST['hasil'] == $hasil) {
                            $_SESSION['status'] = true;
                            echo "<script>document.location.href = '../view/error/error-msg.php?HttpStatus=200';</script>";
                            die;
                        } else {
                            $_SESSION['status'] = false;
                            echo "<script>document.location.href = '../view/index.php';</script>";
                            die;
                        }
                    }
                    $_COOKIE['cookies'] = $userInput;
                    $_SERVER['HTTPS'] = "on";
                    $HttpStatus = $_SERVER["REDIRECT_STATUS"];
                    if ($HttpStatus == 400) {
                        echo "<script>document.location.href = '../view/error/error-msg.php?HttpStatus=400';</script>";
                        die;
                    }
                    if ($HttpStatus == 403) {
                        echo "<script>document.location.href = '../view/error/error-msg.php?HttpStatus=403';</script>";
                        die;
                    }
                    if ($HttpStatus == 500) {
                        echo "<script>document.location.href = '../view/error/error-msg.php?HttpStatus=500';</script>";
                        die;
                    }
                    setcookie($response[$table], $row, time() + (86400 * 30), "/");
                    array_push($response[$table], $row);
                    die;
                    exit;
                }
            } else {
                unset($_POST['hasil']);
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../view/index.php';</script>";
                die;
            }
        }
    }
}
