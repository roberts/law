 <?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        DB::table('contacts')->insert([
            'slug'          => 'rlo',
            'display_name'  => 'Roberts Law Office, PLLC',
            'type_id'       => 6,
            'address'       => '301 E Main Street, Suite 1000-C',
            'city'          => 'Lexington',
            'state'         => 'KY',
            'zip'           => '40507',
            'work_phone'    => '859-231-0202',
            'fax'           => '859-201-1074',
            'website'       => 'rloky.com',
            'corp_name'     => 'Roberts Law Office, PLLC',
            'dba'           => 'Roberts Law Office',
            'created_by'    => 3,
            'updated_by'    => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'dtylerroberts',
            'display_name'  => 'D. Tyler Roberts',
            'type_id'       => 1,
            'user_id'       => 1,
            'last_name'     => 'Roberts',
            'first_name'    => 'David',
            'middle_name'   => 'Tyler',
            'informal_greeting'   => 'Tyler',
            'initials'      => 'DTR',
            'address'       => '301 E Main Street, Suite 1000-C',
            'city'          => 'Lexington',
            'state'         => 'KY',
            'zip'           => '40507',
            'work_phone'    => '859-231-0202',
            'fax'           => '859-201-1074',
            'email'         => 'troberts@rloky.com',
            'website'       => 'rloky.com',
            'title'         => 'Managing Attorney',
            'birth_date'    => '1985-01-18',
            'created_by'    => 3,
            'updated_by'    => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
        DB::table('contacts')->insert([
            'slug'          => 'DrewRoberts',
            'display_name'  => 'Drew Roberts',
            'type_id'       => 1,
            'user_id'       => 2,
            'last_name'     => 'Roberts',
            'first_name'    => 'Andrew',
            'middle_name'   => 'Rutledge',
            'informal_greeting'   => 'Drew',
            'initials'      => 'ARR',
            'address'       => '237 Ridgewood St',
            'city'          => 'Altamonte Springs',
            'state'         => 'FL',
            'zip'           => '32701',
            'cell_phone'    => '407-629-2327',
            'email'         => 'drew@drewroberts.com',
            'website'       => 'drewroberts.com',
            'title'         => 'Web Developer',
            'birth_date'    => '1983-05-20',
            'created_by'    => 3,
            'updated_by'    => 3,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
        
       
    }
}
