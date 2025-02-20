<?php
namespace App\Repositories;

use App\Interface\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $credentials)
    {
        return Auth::attempt($credentials);
        //menggunakan fungsi attempt dari Auth untuk melakukan proses login
        //attempt adalah fungsi bawaan dari laravel yang digunakan untuk melakukan proses login
        //attempt membutuhkan parameter array yang berisi email dan password dari file StoreLoginRequest.php
        //attempt akan mengembalikan true jika proses login berhasil
        //dan false jika proses login gagal
    }

    public function logout()
    {
        return Auth::logout();
        //menggunakan fungsi logout dari Auth untuk melakukan proses logout
        //logout adalah fungsi bawaan dari laravel yang digunakan untuk melakukan proses logout
    }
}