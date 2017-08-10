<?php

use Illuminate\Database\Seeder;

class SourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('sources')->insert([
            'slug'          => 'referral',
            'title'         => 'General Referral',
            'description'   => 'Matter referred to us by a contact.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('sources')->insert([
            'slug'          => 'firm-referral',
            'title'         => 'Referral from a Law Firm',
            'description'   => 'Matter referred to us by another law firm.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('sources')->insert([
            'slug'          => 'internet',
            'title'         => 'General Internet Lead',
            'description'   => 'Matter received from the internet.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('sources')->insert([
            'slug'          => 'facebook',
            'title'         => 'Facebook Lead',
            'description'   => 'Matter received from Facebook.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('sources')->insert([
            'slug'          => 'other',
            'title'         => 'Other Source',
            'description'   => 'Matter received from another source.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
    }
}
