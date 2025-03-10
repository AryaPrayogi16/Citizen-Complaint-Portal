<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    echo "Seeder Berjalan!";
    
    User::create([
        'name' => 'Admin Citizen Complaint Portal',
        'email' => 'aryaprayogi@admin.com',
        'password' => bcrypt('admin123')
    ])->assignRole('admin');
}

}
