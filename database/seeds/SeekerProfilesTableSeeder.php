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

            'sex' => 'm',
            'contact_number' => null,
            'study_abroad_fee' => rand(1000, 99999),
            'passport_number' => null,

            'type_of_room' => null,
            'enrollment_date' => null,
            'graduation_date' => null,
            'status' => 0,
            'course_id' => 0,
            'study_period' => 0,
            'travel_ticket' => 0,
            'for_pickup' => 0,

            'description' => null,
            'prefecture' => null,
            'address1' => null,
            'address2' => null,
            'address3' => null,
            'city' => null,
            'country' => null,
            'birthday' => null,
            'github' => null,
        ];

        for ($i = 1; $i < 30; $i++) {
            $fields = $seeker;
            $name = $fname[rand(0, count($fname) - 1)];
            $name .= ' ' . $lname[rand(0, count($lname) - 1)];
            $fields['name'] .= ucwords($name);
            $fields['japanese_name'] = null;
            $fields['email'] = str_replace(' ', '', strtolower($fields['name'])) . '+' . $i . $fields['email'];
            $fields['contact_number'] = rand(100, 999).rand(100, 999).rand(1000, 9999);
            $fields['study_abroad_fee'] = rand(1000, 99999);
            $fields['passport_number'] = rand(100, 9999).rand(1111, 9999);
            $fields['enrollment_date'] = now()->addMonths(rand(1, 5));
            $fields['graduation_date'] = $fields['enrollment_date']->copy()->addMonths(rand(1, 12));
            $fields['status'] = rand(1, 3);
            $fields['occupation_id'] = rand(1, 3);
            $fields['study_period'] = rand(0, 9);
            $fields['prefecture'] = 'tohoku-2';
            $fields['address1'] = $fields['name'] . ' ' . rand(1, 99);
            $fields['address2'] = $lname[rand(0, count($lname) - 1)];
            $fields['address3'] = rand(876, 854);
            $fields['country'] = 'JPN';
            $fields['birthday'] = now()->subMonths(rand(10, 30));
            $fields['description'] = "Hi! I am " . ucwords($name) . "!";
            $fields['course_id'] = rand(1, 10);
            $fields['it_level'] = rand(1, 7);

            $profile = (new SeekerService)->create($fields);
        }
    }
}
