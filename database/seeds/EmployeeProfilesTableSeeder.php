<?php

use App\Services\EmployeeService;
use App\Traits\SeederData;
use Illuminate\Database\Seeder;

class EmployeeProfilesTableSeeder extends Seeder
{
    use SeederData;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fname = $this->fname;
        $lname = $this->lname;
        $desc = $this->desc;
        $prefectures = getPrefecture()->keys();

        $employee = [
            'name' => '',
            'email' => '@gmail.com',
            'password' => 'password',
            'sex' => null,
            'contact_number' => null,
            'status' => 0,
            'passport_number' => null,
            'position_id' => 0,
        ];

        for ($i = 1; $i < 30; $i++) {
            $fields = $employee;
            $t = explode(':', $fname[rand(0, count($fname) - 1)]);
            $name = array_first($t);
            $last_name = $lname[rand(0, count($lname) - 1)];
            $name .= ' ' . $last_name;

            $fields['name'] = ucwords($name);
            $fields['japanese_name'] = null;
            $fields['email'] = str_replace(' ', '', strtolower($fields['name'])) . '+' . $i . $fields['email'];
            $fields['sex'] = array_last($t);
            $fields['contact_number'] = rand(100, 999).rand(100, 999).rand(1000, 9999);
            $fields['status'] = rand(1, 7);
            $fields['passport_number'] = rand(100, 9999).rand(1111, 9999);
            $fields['prefecture'] = $prefectures->random();
            $fields['address1'] = $fields['name'] . ' ' . rand(1, 99);
            $fields['address2'] = $lname[rand(0, count($lname) - 1)];
            $fields['address3'] = rand(876, 854);
            $fields['country'] = 'JPN';
            $fields['birthday'] = now()->subMonths(rand(10, 30));
            $fields['position_id'] = rand(1, 7);
            $fields['birthday'] = now()->subYears(8, 20)->subMonths(rand(2, 8))->subDays(5, 30);

            (new EmployeeService)->create($fields);
        }
    }
}
