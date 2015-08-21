<?php

session_start(); //��������� ������


class AuthClass {
    private $_login = "admin"; //������������� �����
    private $_password = "12345"; //������������� ������

    /**
     * ���������, ����������� ������������ ��� ���
     * ���������� true ���� �����������, ����� false
     * @return boolean
     */
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //���� ������ ����������
            return $_SESSION["is_auth"]; //���������� �������� ���������� ������ is_auth (������ true ���� �����������, false ���� �� �����������)
        }
        else return false; //������������ �� �����������, �.�. ���������� is_auth �� �������
    }

    /**
     * ����������� ������������
     * @param string $login
     * @param string $passwors
     */
    public function auth($login, $passwors) {
        if ($login == $this->_login && $passwors == $this->_password) { //���� ����� � ������ ������� ���������
            $_SESSION["is_auth"] = true; //������ ������������ ��������������
            $_SESSION["login"] = $login; //���������� � ������ ����� ������������
            return true;
        }
        else { //����� � ������ �� �������
            $_SESSION["is_auth"] = false;
            return false;
        }
    }

    /**
     * ����� ���������� ����� ��������������� ������������
     */
    public function getLogin() {
        if ($this->isAuth()) { //���� ������������ �����������
            return $_SESSION["login"]; //���������� �����, ������� ������� � ������
        }
    }


    public function out() {
        $_SESSION = array(); //������� ������
        session_destroy(); //����������
    }
}

$auth = new AuthClass();

if (isset($_POST["login"]) && isset($_POST["password"])) { //���� ����� � ������ ���� ����������
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //���� ����� � ������ ������ �� ���������
        echo "<h2>����� � ������ ������ �� ���������!</h2>";
    }
}

if (isset($_GET["is_exit"])) { //���� ������ ������ ������
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //�������
        header("Location: ?is_exit=0"); //�������� ����� ������
    }
}
