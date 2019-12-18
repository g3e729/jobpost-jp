<?php

namespace App\Services;

use App\Services\FileService;
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
     * Retrieve list
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
            $this->item = $this->model::whereId($id)->first();
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
    public function create(array $fields = [])
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
     * Update model
     *
     * @return mixed
     */
    public function update(array $fields = [])
    {
        try {
            $this->item->update($fields);
            return $this->item;
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Update model
     *
     * @return mixed
     */
    public function updateUser(array $fields = [])
    {
        if (! $this->user) {
            $this->user = $this->item->user;
        }

        if (! $this->user) {
            abort(505);
        }

        $this->user->update($fields);
    }

    public function acPhotoUploader($form_file, $type = 'avatar', $delete = 0)
    {
        try {
            if ($form_file || $delete == 1) {
                $this->item->files()->where('type', $type)->get()->each(function ($file) {
                    $file->delete();
                });
            }
            
            if ($form_file) {
                $path = FileService::uploadFile($form_file, $type);

                $this->item->files()->create([
                    'url' => $path,
                    'file_name' => $form_file->getClientOriginalName(),
                    'type' => $type,
                    'mime_type' => $form_file->getMimeType(),
                    'size' => $form_file->getSize(),
                ]);
            }
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            abort(505, $form_file->getClientOriginalName() . '<br/>' . $e->getMessage());
        }
    }

    public function getItem()
    {
        return $this->item;
    }
}
