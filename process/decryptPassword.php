<?php

function decryptPassword($pass) {

    include './asset/lib.php';
    $hasil_cipher = str_replace(' ', '', $pass);
    $kunci = 'utsskd';
    $panjang_cipher = strlen($hasil_cipher);
    $panjang_kunci = strlen($kunci);

    $index_x = 0;
    $index_y = 0;
    $hasil_konversi = array();
    $hasil_akhir = '';

    while ($index_x < $panjang_cipher) {
        $x = substr($hasil_cipher, $index_x, 1);
        $y = substr($kunci, $index_y, 1);

        $konversi_x = huruf_ke_angka($x);
        $konversi_y = huruf_ke_angka($y);

        if ($konversi_x >= $konversi_y) {
            $hasil = $konversi_x - $konversi_y;
        } else {
            $hasil = $konversi_x + (26 - $konversi_y);
        }

        $hasil_konversi[$index_x] = angka_ke_huruf($hasil);

        $index_x++;
        $index_y++;

        if ($index_y == $panjang_kunci) {
            $index_y = 0;
        }
    }

    $i = 0;
    $hasil_akhir = '';
    while ($i < $index_x) {
        $hasil_akhir .= $hasil_konversi[$i];
        $i++;
    }

    return $hasil_akhir;

}