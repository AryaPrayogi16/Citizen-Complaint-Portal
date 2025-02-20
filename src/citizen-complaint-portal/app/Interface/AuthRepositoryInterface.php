<?php

namespace App\Interface;

interface AuthRepositoryInterface
//interface adalah sebuah blueprint yang berisi fungsi-fungsi yang harus diimplementasikan oleh class yang menggunakannya
{
    public function login(array $credentials);
    //fungsi login yang harus diimplementasikan oleh class yang menggunakan interface ini
    //fungsi ini membutuhkan parameter array yang berisi email dan password
    //fungsi ini akan mengembalikan true jika proses login berhasil
    //$credentials adalah parameter yang berisi email dan password yang dikirimkan oleh user melalui form login di LoginController.php

    public function logout();

}