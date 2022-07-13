<?php

use Illuminate\Database\Seeder;

class MCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            1 => '貝類',
            2 => '鯛',
            3 => 'その他',
        ];

        foreach ($values as $value) {
            DB::table('m_categories')->insert([
                'name' => $value
            ]);
        }
    }
}
