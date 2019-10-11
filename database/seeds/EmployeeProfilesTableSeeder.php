<?php

use App\Services\EmployeeService;
use Illuminate\Database\Seeder;

class EmployeeProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = [
            'name' => 'Employee',
            'email' => '@gmail.com',
            'password' => 'password',
            'sex' => null,
            'contact_number' => null,
            'status' => 0,
            'passport_number' => null,
            'avatar' => null,
            'position_id' => 0,
            'period' => 0,
        ];

        for ($i = 1; $i < 30; $i++) {
            $fields = $employee;
            $fields['email'] = strtolower($fields['name']) . '+' . $i . $fields['email'];

            (new EmployeeService)->create($fields);
        }
    }
}
