<?php

namespace App\Services;

use App\Models\Portfolio;
use App\Services\UserService;
use App\Services\FileService;
use Exception;

class PortfolioService extends BaseService
{
    // single model
    protected $item;

    public function __construct($item = null)
    {
        parent::__construct(Portfolio::class);

        if ($item instanceof Portfolio) {
            $this->item = $item;
        }
    }

    public function insertOrUpdate($model, $request_data)
    {
		$i = 0;
        $model_portfolios = $model->portfolios()->orderBy('created_at', 'ASC')->get();

		foreach($request_data as $portfolio) {
		    if (! empty($portfolio['title']) && ! empty($portfolio['description'])) {
		        $field = array_except($portfolio, 'file');
		        $req_file = $portfolio['file'] ?? null;

		        if (isset($model_portfolios[$i])) {
		            $portfolio = $model_portfolios[$i];

		            $portfolio->update($field);
		        } else {
		            $portfolio = $model->portfolios()->create($field);
		        }

		        if ($field['delete'] == 1) {
		        	$portfolio->file()->delete();
		        }

		        if ($req_file) {
                    $path = FileService::uploadFile($req_file, 'portfolio');

		            $portfolio->file()->create([
		                'url' => $path,
		                'file_name' => $req_file->getClientOriginalName(),
		                'type' => 'portfolio',
		                'mime_type' => $req_file->getMimeType(),
		                'size' => $req_file->getSize()
		            ]);
		        }
		    }

		    $i++;
		}
        return $this->item;
    }

    public function insert($model, $request_data)
    {
    	return $model->portfolios()->create($request_data);
    }

    public function revise($id, $request_data)
    {
    	$portfolio = Portfolio::find($id);

    	$portfolio->update($request_data);

    	return $portfolio;
    }
}
