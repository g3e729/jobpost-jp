<?php

namespace App\Services;

use App\Models\User;
use App\Models\CompanyProfile;
use App\Services\UserService;
use App\Services\FileService;
use Exception;

class CompanyService extends BaseService
{
    // single model
    protected $item;
    protected $user;

    public function __construct($item = null)
    {
        parent::__construct(CompanyProfile::class);

        if ($item instanceof CompanyProfile) {
            $this->item = $item;
            $this->user = $item->user;
        }
    }

    public function create($fields = [])
    {
        try {
            $this->createUser($fields);

            if (! $this->user) {
                return null;
            }

            $profile_fields = array_except($fields, ['name', 'japanese_name', 'email', 'password']);

            if (! count($profile_fields)) {
                return $this->item;
            }

            if ($this->user->profile) {
                $this->user->profile->update($profile_fields);
            } else {
                $this->user->profile()->create($profile_fields);
            }

            $this->item = $this->model::where('user_id', $this->user->id)->first();

            return $this->item;
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            abort(505, $e->getMessage());
        }
    }

    public function updateSocialMedia($social_media_accounts = [])
    {
        try {
            $this->item->social_media()->delete();

            foreach ($social_media_accounts as $social_media => $url) {
                $this->item->social_media()->create(compact('social_media', 'url'));
            }
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            abort(505, $e->getMessage());
        }
    }

    public function wwhPhotoUploader(array $photos = [])
    {
        try {
            foreach($photos as $key => $files) {
                $relation = $key . '_photo';
                $collection = $key . '_photos';
                $type_files = $this->item->files()->where('type', $relation)->orderBy('sort')->get();

                foreach ($files as $sort => $req_file) {

                    if (isset($type_files[$sort]) && $req_file['delete'] == 1) {
                        $type_files[$sort]->delete();
                    }

                    if (isset($req_file['file'])) {
                        $path = FileService::uploadFile($req_file['file'], $relation);

                        $this->item->files()->create([
                            'url' => $path,
                            'file_name' => $req_file['file']->getClientOriginalName(),
                            'type' => $relation,
                            'mime_type' => $req_file['file']->getMimeType(),
                            'size' => $req_file['file']->getSize(),
                            'sort' => $sort,
                        ]);
                    }
                }
            }
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            abort(505, $req_file['file']->getClientOriginalName() . '<br/>' . $e->getMessage());
        }
    }
    
    public function search($fields, $paginated = true)
    {
        try {
            $fields = array_filter($fields);
            $que = (new $this->model)->popular();

            foreach ($fields as $column => $value) {
                switch ($column) {
                    case 'search':
                        $que = $que->search($fields['search']);
                    break;
                    default:
                        $que = $que->where($column, $value);
                    break;
                }
            }

            return $this->toReturn($que, $paginated);
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            return $this->toReturn();
        }
    }

    public function companyFilters()
    {
        $industries = CompanyProfile::getIndustries();

        return compact('industries');
    }

    private function createUser($fields = [])
    {
        try {
            $userService = (new UserService);
            $user = $userService->findEmail($fields['email']);

            $user_fields = array_only($fields, ['email', 'password']);
            $user_fields['name'] = $fields['name'] ?? $fields['company_name'];

            if (! $user) {
                $user = $userService->create($user_fields);

                $userService->attachRole($this->model::ROLE);
            }

            $this->user = $user;
        } catch (Exception $e) {
            \Log::error(__METHOD__ . '@' . $e->getLine() . ': ' . $e->getMessage());
            abort(505, $e->getMessage());
        }
    }
}
