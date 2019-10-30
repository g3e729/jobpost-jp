<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\EmployeeProfile;
use App\Models\SeekerProfile;
use App\Services\EmployeeService;
use App\Services\SeekerService;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $invitation = Invitation::where('code', $request->get('code'))->first();

        if (! $invitation) {
            abort(404);
        }
        
        $step = $request->get('step', 1);
        $progress = ($step / 2) * 100;
        $profile_id = $request->get('profile_id', 0);

        if (! $invitation) {
            abort(404);
        }

        $type = Invitation::getTypes($invitation->type);

        $data = compact(
            'invitation',
            'profile_id',
            'progress',
            'step',
            'type'
        );

        $method = 'form'.ucwords($type);

        $data = $this->$method($step, $data);

        return view('register.'.$type, $data);
    }

    public function store(RegisterRequest $request)
    {
        $invitation = Invitation::where('code', $request->get('code'))->first();

        if (! $invitation) {
            abort(404);
        }

        $step = $request->get('step', 1);
        $type = Invitation::getTypes($invitation->type);
        
        $profile = $this->$type($step, $request);
        $profile_id = $profile->id ?? 0;
        $step++;
        $code = $invitation->code;

        if ($step < 3) {
            return redirect()->route('register.create', compact('code', 'step', 'profile_id'));
        }

        $invitation->delete();

        return redirect()->route('login')->with('message', 'You have successfully registered!');;
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
                $service = (new EmployeeService)->find($request->get('profile_id'));

                $profile = $service->update(
                    $request->except('_token', 'code', 'email', 'password_confirmation', 'step', 'type')
                );
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
                $service = (new SeekerService)->find($request->get('profile_id'));

                $profile = $service->update(
                    $request->except('_token', 'code', 'email', 'password_confirmation', 'step', 'type')
                );
            break;
        }

        return $profile;
    }

    private function formEmployee($step, $data = [])
    {
        switch ($step) {
            case 1:
                $data['prefectures'] = getPrefecture();
            break;
            case 2:
                $data['countries'] = getCountries();
                $data['employment_status'] = EmployeeProfile::getEmploymentStatus();
                $data['positions'] = EmployeeProfile::getPositions();
            break;
        }

        return $data;
    }

    private function formStudent($step, $data = [])
    {
        switch ($step) {
            case 1:
                $data['prefectures'] = getPrefecture();
            break;
            case 2:
                // $data['countries'] = getCountries();
                $data['student_status'] = SeekerProfile::getStudentStatus();
                $data['occupations'] = SeekerProfile::getOccupations();
            break;
        }

        return $data;
    }
}
