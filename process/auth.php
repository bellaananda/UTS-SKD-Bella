<?php

if ($_POST["submit"] == 'Register') {
    register();
} else if ($_POST["submit"] == 'Login') {
    login();
}

function register() {
    
    include '../database/connection.php';
    include 'vigenere.php';

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
    include 'vigenere.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_salt = $password . $username;
    $password_enc = encryptPassword($password_salt);
    
    $query = "SELECT `id`, `username`, `password` FROM `student_nominee` WHERE `username` = '$username' AND `password` = '$password_enc' LIMIT 1";
    $data = mysqli_query($conn, $query);

    if ($data->num_rows > 0) {
        $result = mysqli_fetch_assoc($data);
        session_start();
        $_SESSION["id"] = $result['id'];
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