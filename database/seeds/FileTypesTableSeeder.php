<?php

use Illuminate\Database\Seeder;

class FileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('file_types')->insert([
            'slug'          => 'dust-mask',
            'title'         => 'Dust Mask',
            'model'         => 'App\IntakeMask',
            'db_table'      => 'intake_masks',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('file_types')->insert([
            'slug'          => 'dui',
            'title'         => 'DUI',
            'model'         => 'App\IntakeDui',
            'db_table'      => 'intake_duis',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('file_types')->insert([
            'slug'          => 'car-wreck',
            'title'         => 'Car Wreck',
            'model'         => 'App\IntakeWreck',
            'db_table'      => 'intake_wrecks',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('file_types')->insert([
            'slug'          => 'slip-fall',
            'title'         => 'Slip & Fall',
            'model'         => 'App\IntakeFall',
            'db_table'      => 'intake_falls',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
    }
}
