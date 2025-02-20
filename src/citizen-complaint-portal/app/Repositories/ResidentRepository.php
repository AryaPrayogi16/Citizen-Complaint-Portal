<?php

namespace App\Repositories;

use App\Models\Resident;
use App\Interface\ResidentRepositoryInterface;
use App\Models\User;

class ResidentRepository implements ResidentRepositoryInterface 
{

    public function getAllResidents() 
    {
        return Resident::all();
        //menggunakan fungsi all() dari model Resident untuk mengambil semua data resident
        // Resident::all adalah eloquent akan mengembalikan semua data resident
    }

    public function getResidentById(int $id) 
    {
        return Resident::where('id', $id)->first();
    }

    public function createResident(array $data) 
    {
       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        //menggunakan fungsi create untuk membuat data user baru
        
        //menggunakan fungsi create untuk membuat data resident baru
        return $user->resident()->create($data)   ;

        
    }

    public function updateResident(array $data, int $id) 
    {
        $resident = $this->getResidentById($id);
        //menggunakan fungsi getResidentById untuk mengambil data resident berdasarkan id

        $resident->user->update([
            'name' => $data['name'],
            'password' => isset($data['password']) ? bcrypt($data['password']) : $resident->user->password,
        ]);
        return $resident->update($data);
        //menggunakan fungsi update untuk mengupdate data resident berdasarkan id 
    }

    public function deleteResident(int $id) 
    {
        $resident = $this->getResidentById($id);
        //menggunakan fungsi getResidentById untuk mengambil data resident berdasarkan id
        $resident->user->delete();
        //menggunakan fungsi delete untuk menghapus data user berdasarkan id
        return $resident->delete();
        //menggunakan fungsi delete untuk menghapus data resident berdasarkan id
    }

}