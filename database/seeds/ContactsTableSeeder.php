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
            'type_id'       => 3,
            'counsel'       => 1,
            'address'       => '301 E Main Street, Suite 1000-C',
            'city'          => 'Lexington',
            'state'         => 'KY',
            'zip'           => '40507',
            'work_phone'    => '859-231-0202',
            'fax'           => '859-201-1074',
            'website'       => 'rloky.com',
            'corp_name'     => 'Roberts Law Office, PLLC',
            'dba'           => 'Roberts Law Office',
            'created_by'    => 2,
            'updated_by'    => 2,
            'created_at'    => '2017-08-14 14:30:00',
            'updated_at'    => '2017-08-14 14:30:00',
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
            'created_by'    => 2,
            'updated_by'    => 2,
            'created_at'    => '2017-08-14 14:30:30',
            'updated_at'    => '2017-08-14 14:30:30',
        ]);
        
        DB::table('contacts')->insert([
            'slug'          => 'drewroberts',
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
            'created_by'    => 2,
            'updated_by'    => 2,
            'created_at'    => '2017-08-14 14:30:45',
            'updated_at'    => '2017-08-14 14:30:45',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'toddwburrislaw',
            'display_name'  => 'Law Office of Todd W. Burris',
            'type_id'       => 3,
            'counsel'       => 1,
            'address'       => '301 E Main Street, Suite 1000-A',
            'city'          => 'Lexington',
            'state'         => 'KY',
            'zip'           => '40507',
            'work_phone'    => '859-252-2222',
            'fax'           => '859-757-2457',
            'website'       => 'toddwburrislaw.com',
            'corp_name'     => 'Law Office of Todd W. Burris, PLLC',
            'dba'           => 'Law Office of Todd W. Burris',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-14 14:45:00',
            'updated_at'    => '2017-08-14 14:45:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'lambert-law-office',
            'display_name'  => 'Lambert Law Office',
            'type_id'       => 3,
            'address'       => 'PO Box 989',
            'city'          => 'Mount Vernon',
            'state'         => 'KY',
            'zip'           => '40456',
            'work_phone'    => '606-256-2742',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:00:00',
            'created_at'    => '2017-08-15 10:00:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'stites-harbison',
            'display_name'  => 'Stites & Harbison',
            'type_id'       => 3,
            'address'       => '400 W Main Street, Suite 1800',
            'city'          => 'Louisville',
            'state'         => 'KY',
            'zip'           => '40202',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:06:00',
            'created_at'    => '2017-08-15 10:06:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'dinsmore-shohl',
            'display_name'  => 'Dinsmore & Shohl LLP',
            'type_id'       => 3,
            'address'       => '101 S Fifth Street, Suite 2500',
            'city'          => 'Louisville',
            'state'         => 'KY',
            'zip'           => '40202',
            'work_phone'    => '859-425-1000',
            'fax'           => '859-425-1099',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:07:00',
            'created_at'    => '2017-08-15 10:07:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'thompson-miller-simpson',
            'display_name'  => 'Thompson Miller & Simpson PLC',
            'type_id'       => 3,
            'address'       => '734 W Main Street, Suite 400',
            'city'          => 'Louisville',
            'state'         => 'KY',
            'zip'           => '40202',
            'work_phone'    => '502-585-9900',
            'fax'           => '502-585-9993',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:08:00',
            'created_at'    => '2017-08-15 10:08:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'thompson-combs-spann',
            'display_name'  => 'Thompson Combs & Spann, PLLC',
            'type_id'       => 3,
            'address'       => '300 Summers Street, Suite 1380',
            'city'          => 'Charleston',
            'state'         => 'WV',
            'zip'           => '25301',
            'work_phone'    => '304-414-1800',
            'fax'           => '304-414-1801',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:09:00',
            'created_at'    => '2017-08-15 10:09:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'napier-gault-schupbach-moore',
            'display_name'  => 'Napier Gault Schupbach & Moore PLC',
            'type_id'       => 3,
            'address'       => '730 W Main Street, Suite 400',
            'city'          => 'Louisville',
            'state'         => 'KY',
            'zip'           => '40202',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:10:00',
            'created_at'    => '2017-08-15 10:10:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'kentucky-mine-supply',
            'display_name'  => 'Kentucky Mine Supply Company',
            'type_id'       => 4,
            'address'       => 'PO Box 779',
            'city'          => 'Harlan',
            'state'         => 'KY',
            'zip'           => '40831',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:11:00',
            'created_at'    => '2017-08-15 10:11:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'mine-service-company',
            'display_name'  => 'Mine Service Company, Inc.',
            'type_id'       => 4,
            'address'       => 'PO Box 858',
            'city'          => 'Hazard',
            'state'         => 'KY',
            'zip'           => '41702',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:12:00',
            'created_at'    => '2017-08-15 10:12:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'mine-safety-appliances',
            'display_name'  => 'Mine Safety Appliances Company, LLC',
            'type_id'       => 5,
            'address'       => '1000 Cranberry Woods Drive',
            'city'          => 'Cranberry Township',
            'state'         => 'PA',
            'zip'           => '16066',
            'dba'           => 'MSA',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:13:00',
            'created_at'    => '2017-08-15 10:13:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => 'american-optical',
            'display_name'  => 'American Optical Corporation',
            'type_id'       => 4,
            'address'       => 'Unknown',
            'city'          => 'Unknown',
            'state'         => 'KY',
            'zip'           => '12345',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:14:00',
            'created_at'    => '2017-08-15 10:14:00',
        ]);

        DB::table('contacts')->insert([
            'slug'          => '3M',
            'display_name'  => '3M Company',
            'type_id'       => 4,
            'address'       => '3M Center, Income Tax, 224-5N-40',
            'city'          => 'St. Paul',
            'state'         => 'MN',
            'zip'           => '55144',
            'created_by'    => 1,
            'updated_by'    => 1,
            'created_at'    => '2017-08-15 10:15:00',
            'created_at'    => '2017-08-15 10:15:00',
        ]);
        
    }
}
