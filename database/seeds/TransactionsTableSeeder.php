<?php

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{

	protected $base_date;
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
    		$this->insertTransaction($company);
    	}

    }

    private function insertTransaction($company)
    {
    	$subscription_price = [10000, 25000];

		$company->transactions()->create([
			'amount' => $subscription_price[rand(0, 1)],
			'type' => 'subscription',
			'created_at' => $this->base_date,
			'updated_at' => $this->base_date,
		]);

		$total = rand(1, 3);
		$day = $this->base_date->copy();

		for ($i = 1; $i <= $total; $i++) {
    		$amount = rand(100, 1000);
    		$day = $day->addDays(rand(1, 3));
			
			$company->transactions()->create([
				'amount' => $amount,
				'type' => 'ticket',
				'created_at' => $day,
				'updated_at' => $day,
    		]);
		}

		if (rand(0, 1)) {
			$this->insertTransaction($company);
		}

		return;
    }
}
