<?php

namespace App\Services;

use App\Services\JobPostService;
use App\Services\CompanyService;
use App\Models\User;
use Exception;

class SearchService extends BaseService
{
    protected $search;

    public function __construct(string $search, bool $paginated = true)
    {
        $this->search = strtolower($search);
        $this->paginated = $paginated;
    }

    public function search(...$types)
    {
        $data = [];

        foreach ($types as $type) {
            $data[$type] = $this->$type($this->search);
        }

        return $data;
    }

    private function jobs($search)
    {
        return $this->returnData(
            (new JobPostService)->search(compact('search'), 'que')
                ->orWhere('programming_language', 'LIKE', "%{$search}%")
                ->orWhereHas('company', function ($q) use ($search) {
                    $q->where('company_name', 'LIKE', "%{$search}%");
                }),
            'jobs_page');
    }

    private function companies($search)
    {
        return $this->returnData((new CompanyService)->search(compact('search'), 'que'), 'companies_page');
    }

    private function returnData($que, $page = 'page')
    {
        if ($this->paginated) {
            return $que->paginate(config('site_settings.per_page'), null, $page);
        }

        return $que->get();
    }
}
