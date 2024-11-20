<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'admin_email' => 'tuandiep.230205@gmail.com',
            'admin_password' => Hash::make('123456789'), // Mã hóa mật khẩu
            'admin_name' => 'manh_tuan',
            'admin_phone' => '0917513519',
        ]);
    }
}
