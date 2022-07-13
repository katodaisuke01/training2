<?php

use Illuminate\Database\Seeder;

class MProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            1 => 'なし',
            2 => '神経〆',
            3 => 'サバ折り',
            4 => '三枚おろし',
            5 => '冷凍',
            6 => 'その他',
        ];

        foreach ($values as $value) {
            DB::table('m_processes')->insert([
                'name' => $value
            ]);
        }
    }
}
