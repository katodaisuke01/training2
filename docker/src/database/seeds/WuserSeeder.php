<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wusers')->insert([
            'service_id' => 123456,
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('pass'),
            'last_name' => 'テスト',
            'first_name' => 'テスト',
            'last_name_kana' => 'テスト',
            'first_name_kana' => 'テスト',
            'm_business_id' => '1',
            'type' => 'MANAGER',
        ]);
    }
}
