<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\CompanyProfile;
use App\Services\UserService;
use Exception;

class TransactionService extends BaseService
{
    // single model
    protected $item;
    protected $company;

    public function __construct($item = null, $company = null)
    {
        parent::__construct(Transaction::class);

        if ($item instanceof Transaction) {
            $this->item = $item;
        }

        if ($company instanceof CompanyProfile) {
            $this->company = $company;
        }
    }

    public function search($fields, $paginated = true, $sort = 'DESC')
    {
        try {
            $fields = array_filter($fields);
            $que = (new $this->model);

            if ($this->company) {
                $que = $this->company->transactions()->where('transactionable_type', CompanyProfile::class);
            }

            foreach ($fields as $column => $value) {
                switch ($column) {
                    case 'search':
                        $que = $que->search($fields['search']);
                    break;
                    case 'date':
                        $que = $que->where('created_at', 'LIKE', $date);
                    break;
                }
            }
            
            $que = $que->orderBy(request()->get('sort_by', 'created_at'), $sort);

            return $this->toReturn($que, $paginated);
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return $this->toReturn();
        }
    }
}
