<?php

use App\Models\Package;
use Illuminate\Database\Seeder;

class DeliveryPartnerIdToPackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::query()->update(['delivery_partner_id' => 7]);
    }
}
