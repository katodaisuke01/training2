<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            1 => 'KDDI株式会社',
            2 => '株式会社BBB',
            3 => '株式会社CCC',
            4 => '株式会社DDD',
            5 => '株式会社EEE',
            6 => '株式会社FFF',
        ];

        foreach ($values as $value) {
            DB::table('m_businesses')->insert([
                'name' => $value,
                'tel' => '08000010001',
                'email' => 'dummy@email.com',
                'zip_code' => '1040054',
                'prefecture' => '1',
                'prefecture_name' => '東京都',
                'address1' => '千代田区',
                'address2' => '飯田橋三丁目10番10号',
                'address3' => '',
            ]);
        }
    }
}
