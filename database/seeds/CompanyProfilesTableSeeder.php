<?php

use App\Services\CompanyService;
use Illuminate\Database\Seeder;

class CompanyProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fname = [
            'Antonio',
            'Canny',
            'Lovely',
            'Emma Josie',
            'Ejie',
            'Francisco',
            'Honesto',
            'Horacio',
            'Jaime Polo',
            'Paul James',
            'Peter',
            'Roberto',
            'Wally',
            'Zaito',
        ];

        $lname = [
            'Chu',
            'Curacha',
            'Duterte',
            'Fuji',
            'Go',
            'Kintanar',
            'Lim',
            'Seito',
            'Suzuki',
            'Tan',
            'Toyota',
            'Yuson',
        ];

        $company = [
            'name' => 'Company ',
            'email' => null,
            'password' => 'password',
            'company_name' => null,
            'description' => null,
            'contact_number' => null,
            'address' => null,
            'city' => 'Tokyo',
            'country' => 'JPN',
            'avatar' => null,
            'homepage' => null,
            'ceo' => null,
            'portfolio' => null
        ];

        for ($i = 1; $i < 11; $i++) {
            $fields = $company;
            $fields['name'] = $fields['name'] . $i;
            $fields['company_name'] = ucwords($fields['name']);
            $ceo = $fname[rand(0, count($fname) - 1)];
            $ceo .= ' ' . $lname[rand(0, count($lname) - 1)];
            $fields['ceo'] .= ucwords($ceo);

            if (rand(0, 1)) {
                $fields['company_name'] = $fields['ceo'];
                $web = str_replace(' ', '', strtolower($fields['company_name'])) . '.com';
            } else {
                $web = str_replace(' ', '', strtolower($fields['company_name'])) . '.com';
            }

            $fields['homepage'] = $web;
            $fields['email'] = 'recruitment+' . $i . '@' . $web;

            (new CompanyService)->create($fields);
        }
    }
}
