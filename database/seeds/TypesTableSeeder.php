<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('types')->insert([
            'slug'          => 'male',
            'title'         => 'Male',
            'description'   => 'Contact persons that are male.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('types')->insert([
            'slug'          => 'female',
            'title'         => 'Female',
            'description'   => 'Contact persons that are female.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('types')->insert([
            'slug'          => 'firm',
            'title'         => 'Law Firm',
            'description'   => 'Contact organizations that are law firms.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('types')->insert([
            'slug'          => 'corporation',
            'title'         => 'Corporation',
            'description'   => 'Contact organizations that are corporations.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('types')->insert([
            'slug'          => 'llc',
            'title'         => 'Limited Liability Company',
            'description'   => 'Contact organizations that are limited liability companies.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('types')->insert([
            'slug'          => 'sole-proprietor',
            'title'         => 'Sole Proprietor',
            'description'   => 'Contact organizations that are sole proprietors.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('types')->insert([
            'slug'          => 'partnership',
            'title'         => 'Partnership',
            'description'   => 'Contact organizations that are partnerships.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('types')->insert([
            'slug'          => 'not-for-profit',
            'title'         => 'Not-for-Profit',
            'description'   => 'Contact organizations that are Not-for-Profit.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('types')->insert([
            'slug'          => 'government',
            'title'         => 'Government Agency',
            'description'   => 'Contact organizations that are government agencies.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
    }
}
