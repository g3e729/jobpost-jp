<?php

namespace App\Services;

use App\Models\File;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Storage;

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

    static function retrievePath($url)
    {
        $s3 = Storage::disk('s3');
        $client = $s3->getDriver()->getAdapter()->getClient();
        $bucket = config('filesystems.disks.s3.bucket');

        $command = $client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $url
        ]);

        return (string) $client->createPresignedRequest($command, '+20 minutes')->getUri();
    }

    static function uploadFile($form_file, $relation)
    {
        try {
            return Storage::disk('s3')->put(config('filesystems.path') . 'images/' . $relation, $form_file);
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            abort(505, $form_file->getClientOriginalName() . '<br/>' . $e->getMessage());
        }
    }
}
