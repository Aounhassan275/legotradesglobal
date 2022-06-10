<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [ 'name' => 'Cash Ali',
            'email' => 'cashali@mail.com',
            'password' => Hash::make('Ali008'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            ]);
            DB::table('users')->insert([
                [ 'name' => 'fake',
                'email' => 'fake1@mail.com',
                'password' => Hash::make('1234'),
                'code' => uniqid(),
                'type' => 'fake',
                'image' => '/profile/311639246735.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ]);
        DB::table('packages')->insert([
            [ 'name' => 'Smallest',
            'price' => '50',
            'direct_income' => '20',
            'indirect_income' => '10',
            'weekly_roi' => '20',
            'withdraw_limit' => '20'],
            [ 'name' => 'Sliver',
            'price' => '100',
            'direct_income' => '20',
            'indirect_income' => '10',
            'weekly_roi' => '20',
            'withdraw_limit' => '20'],
            ]);
       
        DB::table('payments')->insert([
            [ 'method' => 'Binance',
            'name' => 'USDT',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            
        ]);
        DB::table('company_accounts')->insert([
            [ 
            'name' => 'Company Account',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Expense Account',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Reward Account',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
            [ 
            'name' => 'Inloss Account',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()],
        ]);


    }
}
