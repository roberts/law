<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('statuses')->insert([
            'slug'          => 'lead',
            'title'         => 'Lead',
            'description'   => 'Parent Status for all Lead statuses',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('statuses')->insert([
            'slug'          => 'pre-litigation',
            'title'         => 'Pre-Litigation',
            'description'   => 'Parent Status for all Pre-Litigation statuses',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('statuses')->insert([
            'slug'          => 'litigation',
            'title'         => 'Litigation',
            'description'   => 'Parent Status for all Litigation statuses',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

         DB::table('statuses')->insert([
            'slug'          => 'closed',
            'title'         => 'Closed',
            'description'   => 'Parent Status for all Closed statuses',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
    }
}
