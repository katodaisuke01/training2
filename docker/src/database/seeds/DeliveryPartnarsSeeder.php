<?php

use Illuminate\Database\Seeder;

class DeliveryPartnarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            1 => 'ヤマト運輸 クール便',
            2 => '佐川急便　冷蔵',
            3 => 'Fedex transport',
            4 => 'ありさんクール便',
            5 => 'みどりクール便配送',
            6 => 'ゆうぱっく冷蔵',
        ];

        foreach ($values as $value) {
            DB::table('delivery_partnars')->insert([
                'name' => $value,
                'tel' => '08010001000',
                'email' => 'dummy@email.com',
            ]);
        }
    }
}
