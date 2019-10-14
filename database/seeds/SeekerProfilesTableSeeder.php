<?php

use App\Services\SeekerService;
use Illuminate\Database\Seeder;

class SeekerProfilesTableSeeder extends Seeder
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

        $seeker = [
            'name' => '',
            'email' => '@gmail.com',
            'password' => 'password',
            'sex' => null,
            'description' => null,
            'contact_number' => null,
            'address' => null,
            'city' => 0,
            'country' => null,
            'birthday' => null,
            'avatar' => null,
            'portfolio' => null,
            'github' => null
        ];

        for ($i = 1; $i < 30; $i++) {
            $fields = $seeker;
            $name = $fname[rand(0, count($fname) - 1)];
            $name .= ' ' . $lname[rand(0, count($lname) - 1)];
            $fields['name'] .= ucwords($name);
            $fields['email'] = strtolower($fields['name']) . '+' . $i . $fields['email'];

            (new SeekerService)->create($fields);
        }
    }
}
