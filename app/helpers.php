<?php

if (!function_exists('getCountries')) {
    function getCountries($index = null)
    {
        $data = config('countries');

        if ($index) {
            return $data[$index] ?? null;
        }

        return collect($data);
    }
}

if (!function_exists('getPrefecture')) {
    function getPrefecture($index = null)
    {
        $data = config('prefecture');

        if ($index) {
            return $data[$index] ?? null;
        }

        return collect($data);
    }
}

if (!function_exists('getSex')) {
    function getSex($index = null)
    {
        $data = [
            'm' => '男',
            'f' => '女'
        ];

        if ($index) {
            return $data[$index] ?? null;
        }

        return collect($data);
    }
}

if (!function_exists('price')) {
    function price($amount = 0, $decimals = 0)
    {
        $price = number_format($amount, $decimals);

        if ($amount < 0) {
            $price = '-' . $price;
        }

        return $price . '円';
    }
}

if (!function_exists('skillRate')) {
    function skillRate($index = null)
    {
        $data = [
            '0' => '受けてない',
            '1' => '受講中',
            '2' => '受講済み'
        ];

        $index = (int)$index > 2 ? 2 : $index;

        if ($index || $index === 0) {
            return $data[$index] ?? null;
        }

        return collect($data);
    }
}

if (!function_exists('experiences')) {
    function experiences($index = null)
    {
        $data = [
            '1' => 'なし',
            '2' => '半年以内',
            '3' => '1年以内',
            '4' => '1年以上',
            '5' => '２年以上'
        ];

        if ($index || $index === 0) {
            return $data[$index] ?? null;
        }

        return collect($data);
    }
}

if (!function_exists('formatSizeUnits')) {
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}

if (!function_exists('getProfileUrl')) {
    function getProfileUrl($model)
    {
        $role = auth()->user()->hasRole('admin') ? 'admin' : 'employee';

        if ($model instanceof App\Models\EmployeeProfile) {
            return route("{$role}.employees.show", $model);
        } elseif ($model instanceof App\Models\CompanyProfile) {
            return route("{$role}.companies.show", $model);
        } elseif ($model instanceof App\Models\SeekerProfile) {
            return route("{$role}.students.show", $model);
        }

        return '#';
    }
}

if (!function_exists('searchInputs')) {
    function searchInputs()
    {
        return request()->except('_token', 'page', 'per_page', 'sort', 'paginated', 'sort_by');
    }
}

if (!function_exists('apiAbort')) {
    function apiAbort($code = null)
    {
        if ($code === null) {
            $code = 404;
        }

        switch ($code) {
            case '200':
                $message = 'Success.';
                break;
            case '403':
                $message = 'Unauthorized.';
                break;
            case '404':
                $message = 'Not Found.';
                break;
            case '419':
                $message = 'Page Expired.';
                break;
            case '503':
                $message = 'Service Currently Not Available.';
                break;
            case '505':
            default:
                $message = 'Internal Server Error.';
                break;
        }

        header('Content-Type: application/json');
        print json_encode(compact('code', 'message'));
        die;
    }
}

if (!function_exists('adminProfileUrl')) {
    function adminProfileUrl($profile)
    {
        if ($profile instanceof \App\Models\CompanyProfile) {
            return route('admin.companies.show', $profile);
        }

        if ($profile instanceof \App\Models\SeekerProfile) {
            return route('admin.students.show', $profile);
        }

        return '#';
    }
}