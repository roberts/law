<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('permissions')->insert([
            'slug'          => 'admin',
            'title'         => 'Admin',
            'description'   => 'Administors with full access',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('permissions')->insert([
            'slug'          => 'attorney',
            'title'         => 'Attorney',
            'description'   => 'Attorney with a firm',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('permissions')->insert([
            'slug'          => 'staff',
            'title'         => 'Staff',
            'description'   => 'Staff Members at a firm',
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
    }
}
