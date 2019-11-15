<?php

if (! function_exists('getCountries')) {
    function getCountries($index = null)
    {
        $data = config('countries');

        if ($index) {
            return $data[$index] ?? null;
        }

        return collect($data);
    }
}

if (! function_exists('getPrefecture')) {
    function getPrefecture($index = null)
    {
    	$data = config('prefecture');

		if ($index) {
			return $data[$index] ?? null;
		}

		return collect($data);
    }
}

if (! function_exists('getSex')) {
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

if (! function_exists('price')) {
    function price($amount, $decimals = 0)
    {
        $price = number_format($amount, $decimals);

        if ($amount < 0) {
            $price = '-' . $price;
        }

        return $price . '円';
    }
}