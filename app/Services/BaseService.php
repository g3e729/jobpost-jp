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
     * Register new model
     *
     * @return mixed
     */
    public function all($paginate = true)
    {
        try {
            return $this->model::paginate(config('site_settings.per_page'));
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return collect([]);
        }
    }

    /**
     * find item
     *
     * @param $id
     *
     * @return void
     */
    public function find($id)
    {
        try {
            return $this->model::whereId($id)->first();
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
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
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Register new model
     *
     * @return mixed
     */
    public function search($value, $paginate = true)
    {
        try {
            return $this->model::search($value)->paginate(config('site_settings.per_page'));
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return collect([]);
        }
    }
}
