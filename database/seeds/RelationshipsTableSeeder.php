<?php

use Illuminate\Database\Seeder;

class RelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('relationships')->insert([
            'slug'          => 'defendants',
            'title'         => 'Defendants',
            'description'   => 'Use this relationship for all defendants on a file.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('relationships')->insert([
            'slug'          => 'co-counsels',
            'title'         => 'Co-Counsels',
            'description'   => 'Use this relationship for all co-counsels on a file.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('relationships')->insert([
            'slug'          => 'co-workers',
            'title'         => 'Co-Workers',
            'description'   => 'Use this relationship on a file for all co-workers of a client.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('relationships')->insert([
            'slug'          => 'family',
            'title'         => 'Family',
            'description'   => 'Use this relationship on a file for all family members of a client.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('relationships')->insert([
            'slug'          => 'employers',
            'title'         => 'Employers',
            'description'   => 'Use this relationship on a file for all employers of a client.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('relationships')->insert([
            'slug'          => 'providers',
            'title'         => 'Providers',
            'description'   => 'Use this relationship on a file for all providers of a client.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('relationships')->insert([
            'slug'          => 'mines',
            'title'         => 'Mines',
            'description'   => 'Use this relationship on a file for all mines of a client.',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

    }
}