<?php

namespace controller;

use model\Authentication;
use model\message;
use model\pengguna;

class authen
{
    protected $konfigs;
    public function __construct($konfigs)
    {
        $this->konfigs = new Authentication($konfigs);
    }

    public function penggunaSignIn()
    {
        $userInput = htmlspecialchars($_POST['userInput']);
        $passInput = htmlspecialchars(md5($_POST['password'], false));
        $data = $this->konfigs->pengguna($userInput, $passInput);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function adminSignIn()
    {
        $userInputs = htmlspecialchars($_POST['userInput']);
        $passInputs = htmlspecialchars(md5($_POST['password'], false));
        $data = $this->konfigs->admin($userInputs, $passInputs);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}

class register
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pengguna($konfig);
    }

    public function create()
    {
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : strip_tags($_POST['username']);
        $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : strip_tags($_POST['email']);
        $password = htmlspecialchars(md5($_POST['password'], false));
        $telepon = htmlentities($_POST['telepon']) ? htmlspecialchars($_POST['telepon']) : strip_tags($_POST['telepon']);
        $tgl_lahir = htmlentities($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir']) : strip_tags($_POST['tgl_lahir']);
        $data = $this->konfig->membuat($username, $email, $password, $telepon, $tgl_lahir);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}
