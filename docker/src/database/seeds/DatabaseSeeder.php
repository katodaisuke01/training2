<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MCategorySeeder::class,
            MFishCategorySeeder::class,
            MBusinessSeeder::class,
            MProcessSeeder::class,
            MUnitSeeder::class,
            UserSeeder::class,
            WuserSeeder::class,
            ClientsSeeder::class,
            DeliveryPartnarsSeeder::class,
            DeliveryUserSeeder::class,
            TraysSeeder::class,
            ShelvesSeeder::class,
            AreasSeeder::class,
            AreasIdToClientsSeeder::class,
            DeliveryPartnerIdToPackagesSeeder::class,
        ]);
    }
}
