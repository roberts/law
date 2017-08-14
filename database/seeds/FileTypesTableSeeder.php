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
            'title'         => 'dust-mask',
            'title'         => 'Dust Mask',
            'model'         => 'App\IntakeMask',
            'db_table'      => 'intake_masks',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
    }
}
