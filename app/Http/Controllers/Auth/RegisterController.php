<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\CompanyProfile;
use App\Models\EmployeeProfile;
use App\Models\SeekerProfile;
use App\Services\CompanyService;
use App\Services\EmployeeService;
use App\Services\SeekerService;
use App\Services\UserService;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $invitation = Invitation::where('code', $request->get('code'))->first();

        if (!$invitation) {
            abort(404);
        }

        if ($invitation->created_at->diffInMonths(now()) >= 2) {
            $invitation->delete();
            abort(404);
        }

        $step = $request->get('step', 1);
        $progress = ($step / 2) * 100;
        $profile_id = session('profile_id', 0);
        $type = Invitation::getTypes($invitation->type);

        $image = asset('img/register/' . $type . '-bg.png');

        $data = compact(
            'image',
            'invitation',
            'profile_id',
            'progress',
            'step',
            'type'
        );

        $method = 'form' . ucwords($type);

        $data = $this->$method($step, $data);

        return view('register.' . $type, $data);
    }

    public function store(RegisterRequest $request)
    {
        $invitation = Invitation::where('code', $request->get('code'))->first();

        if (!$invitation) {
            abort(404);
        }

        $step = $request->get('step', 1);
        $type = Invitation::getTypes($invitation->type);

        $profile = $this->$type($step, $request);
        session(['profile_id' => $profile->id ?? 0]);
        $step++;
        $code = $invitation->code;

        if ($step < 3) {
            return redirect()->route('register.create', compact('code', 'step'));
        }

        $invitation->delete();
        session()->forget('profile_id');

        return redirect()->route('login')->with('message', 'You have successfully registered!');
    }

    private function company($step, $request)
    {
        switch ($step) {
            case 1:
                $profile = (new CompanyService)->create(
                    $request->except('_token', 'step', 'code', 'password_confirmation', 'type')
                );
                break;
            case 2:
                $companyService = (new CompanyService);
                $profile = $companyService->find(session('profile_id', 0));

                $profile->user->update($request->only('password'));

                $profile->update(
                    $request->except('_token', 'code', 'email', 'password_confirmation', 'step', 'type')
                );

                if ($request->has('avatar')) {
                    $companyService->acPhotoUploader($request->avatar);
                }

                if ($request->has('cover_photo')) {
                    $companyService->acPhotoUploader($request->cover_photo, 'cover_photo');
                }
                break;
        }

        return $profile;
    }

    private function employee($step, $request)
    {
        switch ($step) {
            case 1:
                $profile = (new EmployeeService)->create(
                    $request->except('_token', 'step', 'code', 'password_confirmation', 'type')
                );
                break;
            case 2:
                $employeeService = (new EmployeeService);
                $profile = $employeeService->find(session('profile_id', 0));

                $profile->user->update($request->only('password'));

                $profile->update(
                    $request->except('_token', 'code', 'email', 'password_confirmation', 'step', 'type')
                );

                if ($request->has('avatar')) {
                    $employeeService->acPhotoUploader($request->avatar);
                }
                break;
        }

        return $profile;
    }

    private function student($step, $request)
    {
        switch ($step) {
            case 1:
                $profile = (new SeekerService)->create(
                    $request->except('_token', 'step', 'code', 'password_confirmation', 'type')
                );
                break;
            case 2:
                $seekerService = (new SeekerService);
                $profile = $seekerService->find(session('profile_id', 0));

                $profile->user->update($request->only('password'));

                $profile->update(
                    $request->except('_token', 'code', 'email', 'password_confirmation', 'step', 'type')
                );

                if ($request->has('avatar')) {
                    $seekerService->acPhotoUploader($request->avatar);
                }
                break;
        }

        return $profile;
    }

    private function formCompany($step, $data = [])
    {
        switch ($step) {
            case 1:
                $data['prefectures'] = getPrefecture();
                $data['industries'] = CompanyProfile::getIndustries();
                break;
            case 2:
                // $data['countries'] = getCountries();
                break;
        }

        return $data;
    }

    private function formEmployee($step, $data = [])
    {
        switch ($step) {
            case 1:
                $data['prefectures'] = getPrefecture();
                $data['employment_status'] = EmployeeProfile::getEmploymentStatus();
                $data['countries'] = getCountries();
                $data['positions'] = EmployeeProfile::getPositions();
                break;
            case 2:
                break;
        }

        return $data;
    }

    private function formStudent($step, $data = [])
    {
        switch ($step) {
            case 1:
                $data['prefectures'] = getPrefecture();
                $data['occupations'] = SeekerProfile::getOccupations();
                break;
            case 2:
                // $data['countries'] = getCountries();
                $data['student_status'] = SeekerProfile::getStudentStatus();
                break;
        }

        return $data;
    }
}
