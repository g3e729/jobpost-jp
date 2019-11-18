<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyProfile as Company;
use App\Services\CompanyService;
use App\Services\UserService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
	public function index(Request $request)
	{
        $prefectures = getPrefecture();
        $industries = Company::getIndustries();
        
		$companies = (new CompanyService)->search($request->except('page'));

		return view('admin.companies.index', compact('companies', 'industries', 'prefectures'));
	}
	
	public function show(Company $company)
	{
		return view('admin.companies.show', compact('company'));
	}
	
	public function edit(Company $company, Request $request)
	{
      	$step = $request->get('step', 1);
		$data = compact('company', 'step');

      	switch ($step) {
      		case 2:
      		break;
      		default:
		    $countries = getCountries();
		    $industries = Company::getIndustries();
		    $prefectures = getPrefecture();

		    $data = array_merge($data, compact('company', 'countries', 'industries', 'prefectures'));
      	}

		return view('admin.companies.edit', $data);
  	}
	
	public function update(Company $company, Request $request)
	{

        // dd($request->all());

        $company->update(
            $request->except('_token', '_method', 'email', 'japanese_name', 'name')
        );

        $company->user()->update(
            $request->only('email', 'japanese_name', 'name')
        );

        $social_media_accounts = $request->get('social_media', []);
        $company->social_media()->delete();

        foreach ($social_media_accounts as $social_media => $url) {
        	$company->social_media()->create(compact('social_media', 'url'));
        }

        if ($request->file('avatar')) {
            $file = $request->avatar->store('public/avatar');
            $file = explode('/', $file);

            $company->files()->where('type', 'avatar')->delete();

            $company->files()->create([
                'url' => asset('/storage/avatar/' . array_last($file)),
                'file_name' => $request->avatar->getClientOriginalName(),
                'type' => 'avatar',
                'mime_type' => $request->avatar->getMimeType(),
                'size' => $request->avatar->getSize(),
            ]);
        }

        if ($request->file('cover_photo')) {
            $file = $request->cover_photo->store('public/cover_photo');
            $file = explode('/', $file);

            $company->files()->where('type', 'cover_photo')->delete();

            $company->files()->create([
                'url' => asset('/storage/cover_photo/' . array_last($file)),
                'file_name' => $request->cover_photo->getClientOriginalName(),
                'type' => 'cover_photo',
                'mime_type' => $request->cover_photo->getMimeType(),
                'size' => $request->cover_photo->getSize(),
            ]);
        }

        if ($request->photos) {

            foreach($request->photos as $key => $files) {
                $relation = $key . '_photo';
                $collection = $key . '_photos';
                $comp_files = $company->$collection;

                foreach ($files as $sort => $req_file) {
                    $file = $req_file->store('public/' . $relation);
                    $file = explode('/', $file);

                    if (isset($comp_files[$sort])) {
                        $comp_files[$sort]->delete();
                    }

                    $company->files()->create([
                        'url' => asset("/storage/{$relation}/" . array_last($file)),
                        'file_name' => $req_file->getClientOriginalName(),
                        'type' => $relation,
                        'mime_type' => $req_file->getMimeType(),
                        'size' => $req_file->getSize(),
                        'sort' => $sort,
                    ]);
                }
            }
        }

        if ($request->has('features')) {
            $company->features()->delete();
            $features = $request->get('features');

            foreach([0, 1, 2] as $i) {
                $feature = $features[$i];

                if (empty($feature['title']) && empty($feature['description'])) {
                    continue;
                }

                $company->features()->create($feature);
            }
        }

        if ($request->has('portfolios')) {
            $comp_portfolios = $company->portfolios()->orderBy('created_at', 'ASC')->get();
            $portfolios = $request->get('portfolios');
            $i = 0;

            foreach($request->portfolios as $portfolio) {
                if (! empty($portfolio['title']) && ! empty($portfolio['description'])) {
                    $field = array_except($portfolio, 'file');
                    $req_file = $portfolio['file'] ?? null;

                    if (isset($comp_portfolios[$i])) {
                        $portfolio = $comp_portfolios[$i];

                        $portfolio->update($field);
                    } else {
                        $portfolio = $company->portfolios()->create($field);
                    }

                    if ($req_file) {
                        $file = $req_file->store('public/portfolio');
                        $file = explode('/', $file);

                        $portfolio->files()->create([
                            'url' => asset("/storage/portfolio/" . array_last($file)),
                            'file_name' => $req_file->getClientOriginalName(),
                            'type' => 'portfolio',
                            'mime_type' => $req_file->getMimeType(),
                            'size' => $req_file->getSize()
                        ]);
                    }
                }

                $i++;
            }

        }

		return redirect()->route('admin.companies.show', $company)
            ->with('success', "Success! Employee details is updated!");
	}
    
    public function destroy(Company $company)
    {
        $userService = (new UserService($company->user));
        $userService->destroy();

        return redirect()->route('admin.companies.index')
            ->with('success', "Success! Company is deleted!");
    }
}
