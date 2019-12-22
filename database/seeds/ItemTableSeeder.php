<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Snow Day Jacket',
            'description' => 'Perfect for a snowy outing!',
            'image' => 'snowday_jacket.jpg',
            'price'=>75000,
            'borrowed' => false,
            'provider_id' => 1
        ]);
        DB::table('items')->insert([
            'name' => 'Suit',
            'description' => 'Your formal wear!',
            'image' => 'black_suit.png',
            'price'=>100000,
            'borrowed' => false,
            'provider_id' => 2
        ]);
        DB::table('items')->insert([
            'name' => 'Star Lord Helmet',
            'description' => 'Be the lord!',
            'image' => 'star_lord.jpg',
            'price'=>25000,
            'borrowed' => false,
            'provider_id' => 2
        ]);
        DB::table('items')->insert([
            'name' => 'Witch Costume',
            'description' => 'Be the witch!',
            'image' => 'witch.webp',
            'price'=>75000,
            'borrowed' => false,
            'provider_id' => 2
        ]);
    }
}
