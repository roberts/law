<?php

use Illuminate\Database\Seeder;

class OrganizationMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        
        DB::table('organization_members')->insert([
            'organization_id'   => 1,
            'member_id'         => 2,
            'admin'             => 1,
            'created_by'        => 2,
            'updated_by'        => 2,
            'created_at'        => $now,
            'updated_at'        => $now,
        ]);

        DB::table('organization_members')->insert([
            'organization_id'   => 1,
            'member_id'         => 3,
            'created_by'        => 2,
            'updated_by'        => 2,
            'created_at'        => $now,
            'updated_at'        => $now,
        ]);
        
    }
}
