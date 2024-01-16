<?php
require_once 'config/Database.php';

class Login extends Database
{
    // MENGAMBIL DATA USER SESUAI EMAIL DAN PASSWORD\

    public function getUser($email, $password)
    {
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = mysqli_real_escape_string($this->conn, $password);

        $query = "SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $password . "'";
        $result = $this->query($query);

        return $result;
    }
}
