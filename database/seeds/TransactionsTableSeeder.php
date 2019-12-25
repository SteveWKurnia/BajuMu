<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
           'user_id'=>1,
           'provider_id'=>1,
           'item_id'=>1,
           'is_completed'=>false
        ]);
    }
}
