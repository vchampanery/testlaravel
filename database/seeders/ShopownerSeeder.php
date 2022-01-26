<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopownerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $showowner =  [
            [
            'shopowner_name' => 'Shop1',
            'shopowner_email' => 'shop1@devrepublic.nl',
            'shopowner_role' => 'Shop',
            'shopowner_username' => 'shop1',
            'shopowner_password' => 'devhero',
            'shopowner_language' => 'en',
            'shopowner_currency' => 'USD',
            'shopowner_active'	 => true,
            ],
            [
                'shopowner_name' => 'Shop2',
                'shopowner_email' => 'shop2@devrepublic.nl',
                'shopowner_role' => 'Shop',
                'shopowner_username' => 'shop2',
                'shopowner_password' => 'devhero',
                'shopowner_language' => 'en',
                'shopowner_currency' => 'USD',
                'shopowner_active'	 => true,
            ],
            [
                'shopowner_name' => 'User1',
                'shopowner_email' => 'user1@devrepublic.nl',
                'shopowner_role' => 'User',
                'shopowner_username' => 'user1',
                'shopowner_password' => 'devhero',
                'shopowner_language' => 'en',
                'shopowner_currency' => 'USD',
                'shopowner_active'	 => true,
            ],
            [
                'shopowner_name' => 'User2',
                'shopowner_email' => 'user2@devrepublic.nl',
                'shopowner_role' => 'User',
                'shopowner_username' => 'user2',
                'shopowner_password' => 'devhero',
                'shopowner_language' => 'nl',
                'shopowner_currency' => 'EUR',
                'shopowner_active'	 => true,
            ]];
        DB::table('shopowner')->insert($showowner);
    }
}
