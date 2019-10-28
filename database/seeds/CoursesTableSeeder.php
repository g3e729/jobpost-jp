<?php

use Illuminate\Database\Seeder;
use App\Services\CourseService;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			['name' => 'Basic', 'type' => 'it'],
			['name' => 'Ruby on Rails Standard', 'type' => 'it'],
			['name' => 'Ruby on Rails Advance', 'type' => 'it'],
			['name' => 'Ruby on Rails Expert', 'type' => 'it'],
			['name' => 'Develop Standard', 'type' => 'it'],
			['name' => 'Develop Advance', 'type' => 'it'],
			['name' => 'Design Standard', 'type' => 'it'],
			['name' => 'Design Advance', 'type' => 'it'],
			['name' => 'Python Standard', 'type' => 'it'],
			['name' => 'Python Advance', 'type' => 'it']
    	];

        foreach($data as $fields) {
            (new CourseService)->create($fields);
        }
    }
}
