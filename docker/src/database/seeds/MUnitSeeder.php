<?php

use Illuminate\Database\Seeder;

class MUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            1 => '個',
            2 => '尾',
            3 => 'セット',
            4 => '杯',
            5 => 'その他',
        ];

        foreach ($values as $value) {
            DB::table('m_units')->insert([
                'name' => $value
            ]);
        }
    }
}
