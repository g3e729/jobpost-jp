<?php

namespace App\Services;

use Exception;

class BaseService
{
    /**
     * The base service model
     *
     * @var
     */
    protected $model;

    /**
     * Create a new service instance
     *
     * @param $model
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * find item
     *
     * @param $id
     *
     * @return void
     */
    public function find($id = null)
    {
        try {
            return $this->model::find($id);
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Register new model
     *
     * @return mixed
     */
    public function create(array $fields)
    {
        try {
            $this->item = $this->model::create($fields);
            return $this->item;
        } catch (Exception $e) {
            return $e;
        }
    }
}
