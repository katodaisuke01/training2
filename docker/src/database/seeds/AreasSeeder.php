<?php

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            ['name' => '東京エリアA'],
        ];

        DB::transaction(function () use ($values) {
            foreach ($values as $value) {
                Area::create($value);
            }
        });
    }
}
