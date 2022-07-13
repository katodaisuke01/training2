<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\DeliveryUser;

class DeliveryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountList = [
            ['vary' => '管理者', 'name' => 'テスト テスト',
                'mail' => Str::random(10) . '@gmail.com', 'tel' => '09000000000', 'service_id' => '123456'],
            ['date' => '2022/02/31', 'vary' => '管理者', 'name' => '山田 太郎',
                'mail' => 'taro.yamada@mail.com', 'tel' => '09012345678', 'date_last' => '2022/03/05', 'service_id' => '123457'],
            ['date' => '2022/02/30', 'vary' => '管理者', 'name' => '田中 玲奈',
                'mail' => 'reina.yamada@mail.com', 'tel' => '09012345677', 'date_last' => '2022/03/04', 'service_id' => '123458'],
            ['date' => '2022/02/29', 'vary' => '作業者', 'name' => '勅使河原 龍之介',
                'mail' => 'ryu.yamada@mail.com', 'tel' => '08012345676', 'date_last' => '2022/03/02', 'service_id' => '123459'],
            ['date' => '2022/02/28', 'vary' => '作業者', 'name' => '蒲田 涼',
                'mail' => 'ryo.yamada@mail.com', 'tel' => '08012345675', 'date_last' => '2022/03/02', 'service_id' => '123460'],
            ['date' => '2022/02/27', 'vary' => '作業者', 'name' => '斎藤 陽子',
                'mail' => 'yoko.yamada@mail.com', 'tel' => '08012345674', 'date_last' => '2022/03/01', 'service_id' => '123461']
        ];

        foreach ($accountList as $account) {
            $name = explode(' ', $account['name']);
            DeliveryUser::create([
                'delivery_partner_id' => 7,
                'service_id' => $account['service_id'],
                'email' => $account['mail'],
                'password' => Hash::make('pass'),
                'last_name' => $name[0],
                'first_name' => $name[1],
                'last_name_kana' => 'テスト',
                'first_name_kana' => 'テスト',
                'type' => array_search($account['vary'], DeliveryUser::AUTHORITY_LIST),
                'tel' => $account['tel'],
            ]);
        }
    }
}
