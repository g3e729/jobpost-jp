<?php

use App\Services\CompanyService;
use App\Traits\SeederData;
use Illuminate\Database\Seeder;

class CompanyProfilesTableSeeder extends Seeder
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

        $company = [
            'name' => null,
            'email' => null,
            'password' => 'password',

            'user_id' => null,
            'company_name' => null,
            'description' => null,
            'contact_number' => null,
            'prefecture' => null,
            'address1' => null,
            'address2' => null,
            'address3' => null,
            'city' => null,
            'country' => null,
            'industry_id' => null,
            'cover_photo' => null,
            'homepage' => null,
            'ceo' => null,
            'number_of_employees' => null,
            'established_date' => null
        ];

        for ($i = 1; $i < 11; $i++) {
            $fields = $company;
            $t = explode(':', $fname[rand(0, count($fname) - 1)]);
            $name = array_first($t);
            $last_name = $lname[rand(0, count($lname) - 1)];
            $name .= ' ' . $last_name;

            $fields['name'] = $name;
            $fields['ceo'] = $fields['name'];
            $fields['company_name'] = rand(0, 1) ? $last_name : $name;
            $fields['company_name'] .= rand(0, 1) ?: ' ' . rand(71, 999);
            if (rand(0, 1)) $fields['company_name'] .= rand(0, 1) ? ' Inc.' : ' Corporation';
            $fields['description'] = rand(0, 1) ? $desc[rand(0, count($desc) - 1)] : ' ' . strrev($desc[rand(0, count($desc) - 1)]);

            $web = str_replace(' ', '', strtolower($fields['company_name'])) . '.';
            $web .= rand(0, 1) ? 'com' : 'jp';

            $fields['prefecture'] = $prefectures->random();
            $fields['address1'] = rand(10, 90) . ' ' . substr(md5(microtime()), rand(0, 26), rand(3, 6));
            $fields['address2'] = substr(md5(microtime()), rand(0, 26), rand(3, 6));
            $fields['address3'] = substr(md5(microtime()), rand(0, 26), rand(3, 6));
            $fields['city'] = ucwords(array_first($t) . ' ' . substr(md5(microtime()), rand(0, 26), rand(3, 5)) . ' city');
            $fields['country'] = 'JPN';

            $fields['contact_number'] = rand(100, 999).rand(100, 999).rand(1000, 9999);
            $fields['industry_id'] = rand(0, 1) ? 'others' : 1;
            $fields['number_of_employees'] = rand(3, 111);
            $fields['established_date'] = now()->subYears(rand(1, 10))->subMonths(rand(1, 7))->subDays(rand(2, 30));
            $fields['homepage'] = $web;
            $add = rand(0, 1) ? 'recruitment' : 'joinus';
            $add .= substr(md5(microtime()), rand(0, 26), 3);
            $fields['email'] = $add . '+' . $i . '@' . $web;

            (new CompanyService)->create($fields);
        }
    }
}
