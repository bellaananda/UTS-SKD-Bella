<?php

if ($_POST["submit"] == 'Register') {
    register();
} else if ($_POST["submit"] == 'Login') {
    login();
}

function register() {
    
    include '../database/connection.php';

    $nisn = $_POST["nisn"];
    $fullname = $_POST["fullname"];
    $school = $_POST["school"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_salt = $password . $username;
    $password_enc = encryptPassword($password_salt);
    
    $query = "INSERT INTO `student_nominee`(`nisn`, `fullname`, `school`, `username`, `password`) VALUES ('$nisn', '$fullname', '$school', '$username','$password_enc')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Registrasi berhasil');
        window.location.href='../index.php';
        </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Registrasi gagal');
        window.location.href='../index.php';
        </script>");
    }

}

function login() {
    
    include '../database/connection.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_salt = $password . $username;
    $password_enc = encryptPassword($password_salt);
    
    $query = "SELECT `id`, `username`, `password` FROM `student_nominee` WHERE `username` = '$username' AND `password` = '$password_enc' LIMIT 1";
    $data = mysqli_query($conn, $query);

    if ($data->num_rows > 0) {
        $result = mysqli_fetch_assoc($data);
        session_start();
        $_SESSION["id"]  = $result['id'];
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login berhasil');
        window.location.href='../dashboard.php';
        </script>");
    } else {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Login gagal');
        window.location.href='../login.php';
        </script>");
    }

}

function encryptPassword($pass) {

    include '../asset/lib.php';

    $plain = str_replace(' ', '', $pass);
    $kunci = 'utsskd';
    $panjang_plain = strlen($plain);
    $panjang_kunci = strlen($kunci);

    $index_x = 0;
    $index_y = 0;
    $hasil_cipher = array();
    $hasil_akhir = '';

    while ($index_x < $panjang_plain) {
        $x = substr($plain, $index_x, 1);
        $y = substr($kunci, $index_y, 1);

        $hasil_cipher[$index_x] = $tabel_vigenere[huruf_ke_angka($x)][huruf_ke_angka($y)];

        $index_x++;
        $index_y++;

        if ($index_y == $panjang_kunci) {
            $index_y = 0;
        }
    }

    $i = 0;
    while ($i < $index_x) {
        $hasil_akhir .= $hasil_cipher[$i];
        $i++;
    }

    return $hasil_akhir;
}