<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{
    //extends FormRequest berarti class ini adalah class yang digunakan untuk validasi form, FormRequest adalah class bawaan dari laravel yang digunakan untuk validasi form
    // Bagian ini adalah validasi form login

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // validasi email dan password yang dikirimkan oleh user melalui form login harus sesuai dengan format yang diinginkan yaitu email dan required untuk email dan required untuk password
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
