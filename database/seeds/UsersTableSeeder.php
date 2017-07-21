<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        DB::table('users')->insert([
            'first_name'    => 'Tyler',
            'last_name'     => 'Roberts',
            'display_name'  => 'D. Tyler Roberts',
            'initials'      => 'DTR',
            'title'         => 'Managing Attorney',
            'work_phone'    => '859-231-0202',
            'cell_phone'    => '859-231-0202',
            'fax'           => '859-201-1074',
            'email'         => 'troberts@rloky.com',
            'password'      => bcrypt('password'),
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('users')->insert([
            'first_name'    => 'Drew',
            'last_name'     => 'Roberts',
            'display_name'  => 'Drew Roberts',
            'initials'      => 'ARR',
            'title'         => 'Developer',
            'cell_phone'    => '407-629-2327',
            'email'         => 'drew@roberts.email',
            'password'      => bcrypt('password'),
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
       
    }
}
