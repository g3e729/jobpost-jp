<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'name' => 'Admin',
                'slug' => '',
        	],
        	[
        		'name' => 'Company',
                'slug' => '',
        	],
        	[
        		'name' => 'Seeker',
                'slug' => '',
        	],
            [
                'name' => 'Employee',
                'slug' => '',
            ],
        ];

        foreach($data as $item) {
        	Role::firstOrCreate($item);
        }
    }
}
