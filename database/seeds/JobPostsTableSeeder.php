<?php

use Illuminate\Database\Seeder;
use App\Models\CompanyProfile;
use App\Models\JobPost;
use App\Traits\SeederData;

class JobPostsTableSeeder extends Seeder
{
    use SeederData;

	protected $titles = [
		'We are hiring!',
		'Come and join the fun.',
		'Ugently hiring!!!',
		'日本屈指のインフラのスペシャリスト集団！SREエンジニア募集 by 株式会社スリーシェイク',
		'スペシャリストを繋げ、新しいサービスの企画・提案を行う"カタリスト"を募集 by チームラボグループ',
		'Hiring.',
		'HTMLを雇う',
		'HIRING!!!',
		'Expanding members, Apply now!',
		'Apply now!',
		'今雇っている',
		'私達は雇っています',
		'今日ご参加ください',
		'会社には新しいメンバーが必要です',
		'現在拡大中',
		'求人',
		'新しい機会を開く'
	];

	protected $positions = [
		'System Engineer',
		'System Developer',
		'Web Developer',
		'Web Developer[Full Stack]',
		'ブランディングスペシャリスト',
		'Frontend Engineer',
		'Database Manager',
		'Database Personel',
		'Server Manager',
		'Team Leader',
		'システムエンジニア',
		'ウェブ開発者',
		'QA Lead',
		'QA',
		'プロダクトマネージャー',
		'Quality Assurance Team Lead',
		'Jr Developer',
		'Developer',
		'Designer',
		'Web Designer',
		'Branding Specialist',
		'SEO Specialist',
		'Manual Tester',
		'データベースマネージャー',
		'チームリーダー',
		'Tester',
		'Project Manager',
		'Product Manager',
		'ブランディングスペシャリスト',
		'デザイナー',
		'ウェブデザイナー'
	];

	protected $lang_frame = [
		'PHP' => [
			'CodeIgniter',
			'Laravel',
			'Zend',
			'Cake Framework',
			'Fuel',
			'Wordpress',
			'Symfony',
			'CakePHP',
			'Yii',
			'Laravel Framwork',
			'Zend Framework',
			'Phalcon',
			'FuelPHP',
			'Drupal',
			'Cake',
			'PHPixie',
		],
		'C#' => [
			'.NET Core',
			'Windows Forms',
			'Windows Presentation',
			'Mono',
			'ADO.NET',
			'Accord.NET',
			'.NET Micro Framework',
			'Uno'
		],
		'C++' => [
			'POCO C++',
			'Asio C++',
			'Chromium',
			'libsigc++',
			'Blitz++',
		],
		'Ruby' => [
			'Ruby on Rails',
			'RoR',
			'Sinatra',
			'Rack'
		],
	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$companies = CompanyProfile::get();

    	foreach($companies as $company) {
    		$this->base_date = now()->startOfMonth()->subMonth(rand(1, 5));
    		$this->insertJobPost($company);
    	}
    }

    private function insertJobPost($company)
    {
		$company->jobPosts()->create($this->setJobFields($company));

		if (rand(0, 1)) {
			$this->insertJobPost($company);
		}
    }

    private function setJobFields($company)
    {
    	$titles = $this->titles;

    	$title = $titles[array_rand($titles)];

    	if (rand(0, 1)) {
    		$title = "[{$company->company_name}]".$title;
    	}

        $desc = $this->desc;

    	$positions = $this->positions;

    	$languages = array_keys($this->lang_frame);
    	$language = $languages[array_rand($languages)];

    	$frameworks = $this->lang_frame[$language];
    	$framework = $frameworks[array_rand($frameworks)];

    	$environment = [
    		'MacOs',
    		'Windows',
    		'Ubuntu',
    		'Microsoft Windows',
    		'Linux',
    		'Unix',
    		'Chrome OS',
    		'Linux kernel',
    		'MINIX',
    		'OS X',
    		'Fedora'
    	];

    	$employment_types = array_keys(JobPost::getEmploymentTypes()->toArray());

    	$db = [
    		'MySQL',
    		'Oracle',
    		'Microsoft SQL',
    		'PostgreSQL',
    		'SQLite',
    		'Apache',
    		'Apache Cassandra',
    		'Ingres',
    		'eXist',
    		'MongoDB',
    	];

    	$salary = rand(80, 1100);

    	if ($salary < 100) {
    		$salary = '~100';
    	} elseif ($salary > 1000) {
    		$salary = '1000~';
    	}

    	$data = [
			'title' => $title,
			'description' => $desc[array_rand($desc)],

			'position' => $positions[array_rand($positions)],
			'programming_language' => $language,
			'framework' => $framework,
			'environment' => $environment[array_rand($environment)],
			'database' => $db[array_rand($db)],
			'requirements' => $desc[array_rand($desc)],
			'employment_type' => $employment_types[array_rand($employment_types)],
			'number_of_applicants' => rand(1, 100),
			'work_time' => $desc[array_rand($desc)],
	        'salary' => $salary,
			'holidays' => $desc[array_rand($desc)],
			'allowance' => $desc[array_rand($desc)],
			'incentive' => $desc[array_rand($desc)],
			'salary_increase' => $desc[array_rand($desc)],
			'insurance' => $desc[array_rand($desc)],
			'contract_period' => $desc[array_rand($desc)],
			'screening_flow' => $desc[array_rand($desc)],

			'prefecture' => $company->prefecture,
			'address1' => $company->address1,
			'address2' => $company->address2,
			'address3' => $company->address3,
			'city' => $company->city,
			'country' => $company->country,
			'station' => 'None!',
			'published_at' => $this->base_date,
			'created_at' => $this->base_date,
			'updated_at' => $this->base_date,
		];

		return $data;
    }
}
