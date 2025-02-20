<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLoginRequest;
use App\Interface\AuthRepositoryInterface;

class LoginController extends Controller
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function index()
    {
        return view('pages.auth.login');
    }

    public function store(StoreLoginRequest $request){
        //strorelonginrequest adalah class yang digunakan untuk validasi form login
        //class ini berada di dalam folder app/Http/Requests
        $credentials = $request->validated();
        //$credentials adalah variabel yang berisi email dan password dari file StoreLoginRequest.php

        if ($this->authRepository->login($credentials)) {
        //menggunakan fungsi login dari AuthRepository untuk melakukan proses login dari file AuthRepository.php dan $credentials dari file StoreLoginRequest.php
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function logout()
    {
        $this->authRepository->logout();
        return redirect()->route('login');
    }
}
