<?php

use App\Models\Tray;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TraysSeeder extends Seeder
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
                ['code' => 'AN-000001'],
                ['code' => 'AN-000002'],
                ['code' => 'AN-000003'],
                ['code' => 'AN-000004'],
                ['code' => 'AN-000005'],
                ['code' => 'AN-000006'],
                ['code' => 'AN-000007'],
                ['code' => 'AN-000008'],
                ['code' => 'AN-000009'],
            ];

            foreach ($values as $value) {
                Tray::create($value);
            }
        });
    }
}
