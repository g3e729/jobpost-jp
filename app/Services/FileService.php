<?php

namespace App\Services;

use App\Models\File;
use App\Services\UserService;
use Exception;

class FileService extends BaseService
{
    // single model
    protected $item;

    public function __construct($item = null)
    {
        parent::__construct(File::class);

        if ($item instanceof File) {
            $this->item = $item;
        }
    }
    
    public function search($fields, $paginated = true)
    {

        try {
            $fields = array_filter($fields);
            $que = (new $this->model);

            foreach ($fields as $column => $value) {
                switch ($column) {
                    case 'search':
                        $que = $que->search($fields['search']);
                    break;
                    // default:
                    //     $que = $que->where($column, $value);
                    // break;
                }
            }

            if ($paginated) {
                return $que->paginate(config('site_settings.per_page'));
            }

            return $que->get();
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return collect([]);
        }
    }
}
