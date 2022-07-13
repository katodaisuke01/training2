<?php

use App\Models\Shelf;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelvesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $values = [
                ['client_id' => 1, 'name' => 'A棚上段左', 'position_column' => 'A', 'position_row' => 1],
                ['client_id' => 2, 'name' => 'A棚上段中央', 'position_column' => 'B', 'position_row' => 1],
                ['client_id' => 3, 'name' => 'A棚上段右', 'position_column' => 'C', 'position_row' => 1],
                ['client_id' => 4, 'name' => 'B棚上段左', 'position_column' => 'A', 'position_row' => 2],
                ['client_id' => 5, 'name' => 'B棚上段中央', 'position_column' => 'B', 'position_row' => 2],
                ['client_id' => 6, 'name' => 'B棚上段右', 'position_column' => 'C', 'position_row' => 2],
            ];

            foreach ($values as $value) {
                Shelf::create($value);
            }
        });
    }
}
