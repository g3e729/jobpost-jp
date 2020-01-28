<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        if (in_array(config('app.env'), ['dev', 'local'])) {
            $this->call(EmployeeProfilesTableSeeder::class);
            $this->call(CompanyProfilesTableSeeder::class);
            $this->call(SeekerProfilesTableSeeder::class);
            $this->call(JobPostsTableSeeder::class);
            $this->call(TransactionsTableSeeder::class);
        }
    }
}
