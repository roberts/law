<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UserPermissionTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(SourcesTableSeeder::class);
    }
}
