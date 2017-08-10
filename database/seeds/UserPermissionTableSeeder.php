<?php

use Illuminate\Database\Seeder;

class UserPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('user_permission')->insert([
            'user_id'       => 1,
            'permission_id' => 1,
            'created_at'    => $now,
        ]);

        DB::table('user_permission')->insert([
            'user_id'       => 1,
            'permission_id' => 2,
            'created_at'    => $now,
        ]);

        DB::table('user_permission')->insert([
            'user_id'       => 2,
            'permission_id' => 1,
            'created_at'    => $now,
        ]);

        DB::table('user_permission')->insert([
            'user_id'       => 2,
            'permission_id' => 3,
            'created_at'    => $now,
        ]);
        
    }
}
