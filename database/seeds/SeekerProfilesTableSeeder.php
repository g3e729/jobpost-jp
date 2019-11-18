<?php

use App\Models\SeekerProfile;
use App\Services\SeekerService;
use App\Traits\SeederData;
use Illuminate\Database\Seeder;

class SeekerProfilesTableSeeder extends Seeder
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
        $english_levels = SeekerProfile::getEnglishLevels()->keys();
        $skills = array_merge(
            SeekerProfile::getProgrammingLanguages()->keys()->toArray(),
            SeekerProfile::getFrameworks()->keys()->toArray(),
            SeekerProfile::getExperiences()->keys()->toArray(),
            SeekerProfile::getLanguages()->keys()->toArray(),
            SeekerProfile::getOthers()->keys()->toArray()
        );

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
            $t = explode(':', $fname[rand(0, count($fname) - 1)]);
            $name = array_first($t);
            $last_name = $lname[rand(0, count($lname) - 1)];
            $name .= ' ' . $last_name;

            $fields['name'] .= ucwords($name);
            $fields['japanese_name'] = null;
            $fields['email'] = str_replace(' ', '', strtolower($fields['name'])) . '+' . $i . $fields['email'];
            $fields['sex'] = array_last($t);
            $fields['description'] = rand(0, 1) ? $desc[rand(0, count($desc) - 1)] : ' ' . strrev($desc[rand(0, count($desc) - 1)]);
            $fields['contact_number'] = rand(100, 999).rand(100, 999).rand(1000, 9999);
            $fields['study_abroad_fee'] = rand(1000, 99999);
            $fields['passport_number'] = rand(100, 9999).rand(1111, 9999);
            $fields['enrollment_date'] = now()->addMonths(rand(1, 5));
            $fields['graduation_date'] = $fields['enrollment_date']->copy()->addMonths(rand(1, 12));
            $fields['occupation_id'] = rand(1, 3);
            $fields['study_period'] = rand(0, 9);
            $fields['prefecture'] = $prefectures->random();
            $fields['address1'] = $fields['name'] . ' ' . rand(1, 99);
            $fields['address2'] = $lname[rand(0, count($lname) - 1)];
            $fields['address3'] = rand(876, 854);
            $fields['country'] = 'JPN';
            $fields['birthday'] = now()->subYears(rand(11, 41))->subMonths(rand(1, 7))->subDays(rand(2, 30));
            $fields['description'] = "Hi! I am " . ucwords($name) . "!";
            $fields['course_id'] = rand(1, 10);
            $fields['it_level'] = rand(1, 7);
            $fields['github'] = 'https://github.com/' . substr(md5(microtime()), rand(0, 26), rand(3, 6));

            $fields['taken_id'] = [rand(1, 6)];
            $fields['reading'] = rand(0, 600);
            $fields['listening'] = rand(0, 600);
            $fields['speaking'] = rand(0, 600);
            $fields['writing'] = rand(0, 600);
            $fields['english_level_id'] = $english_levels->random();
            $fields['toiec_score'] = rand(0, 600);

            $profile = (new SeekerService)->create($fields);

            foreach ($skills as $skill_id) {
                $data = compact('skill_id');
                $rate = rand(0, 5);

                if ($rate) $data['skill_rate'] = $rate;

                $profile->skills()->create($data);
            }

            foreach ([
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/'
            ] as $social_media => $url) {
                if (rand(0, 1)) continue;
                $data = compact('social_media', 'url');

                $data['url'] .= substr(md5(microtime()), rand(0, 26), rand(3, 6));

                $profile->social_media()->create($data);
            }
        }
    }
}
