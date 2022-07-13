<?php

use Illuminate\Database\Seeder;

class MFishCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            1 => '岩牡蠣',
            2 => '真牡蠣',
        ];

        foreach ($values as $value) {
            DB::table('m_fish_categories')->insert([
                'name' => $value,
                'm_category_id' => 1
            ]);
        }
    }
}
