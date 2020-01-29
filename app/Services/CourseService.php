<?php

namespace App\Services;

use App\Models\Course;
use Exception;

class CourseService extends BaseService
{
    // single model
    protected $item;

    public function __construct($item = null)
    {
        parent::__construct(Course::class);

        if ($item instanceof Course) {
            $this->item = $item;
        }
    }

    public function all($paginate = true)
    {
        try {
            return parent::all();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function create($fields = [])
    {
        return (new Course)->create($fields);
    }
}
