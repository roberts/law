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
            'model'         => 'App\IntakeMask',
            'title'         => 'Dust Mask',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
    }
}
