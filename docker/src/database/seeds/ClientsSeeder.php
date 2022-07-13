<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            1 => ['リストランテ ペッシェ', '09000080007', 'pesshe@gmail.com', '1111111', '東京都', '墨田区', '1丁目1', '東京建物101'],
            2 => ['居酒屋 魚と海', '09007680007', 'sakanaumi@gmail.com', '2222222', '東京都', '台東区', '2丁目1', 'コーポ1階'],
            3 => ['イタリアンバル 魚', '09007689007', 'bal@gmail.com', '3333333', '北海道', '函館市', '3丁目1', ''],
            4 => ['個室ダイニング あお', '09077980007', 'sakanaumi@gmail.com', '4444444', '神奈川県', '横浜市', '4丁目1', '横浜ビル1階'],
            5 => ['居酒屋 魚の篝火', '09007686547', 'tomoshibi@gmail.com', '5555555', '東京都', '豊島区南池袋', '4丁目1', 'ikebukuroタウン5階'],
            6 => ['八百万の宴', '09005430007', 'utage@gmail.com', '6666666', '神奈川県', '横浜市戸塚区', '７丁目1番3', ''],
        ];

        foreach ($values as $value) {
            DB::table('clients')->insert([
                'name' => $value[0],
                'tel' => $value[1],
                'email' => $value[2],
                'zip_code' => $value[3],
                'prefecture_name' => $value[4],
                'address1' => $value[5],
                'address2' => $value[6],
                'address3' => $value[7],
            ]);
        }
    }
}
