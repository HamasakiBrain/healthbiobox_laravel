<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'Администратор'],
            ['name' => 'Менеджер']
        ]);
        DB::table('settings')->insert([
            ['name' => 'Dogovor', 'data' => 'text'],
            ['name' => 'Pay', 'data' => 'text'],
            ['name' => 'Delivery', 'data' => 'text'],
        ]);
        $u = User::create([
            'name' => 'Amon',
            'password' => Hash::make('amon123123'),
            'phone' => 3192312,
            'email' => 'amon_amonov@bk.ru',
            'referral_id' => Str::random(5)
        ])->role()->attach(1);

    }
}
