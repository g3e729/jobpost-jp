<?php

if (! function_exists('getCountries')) {
    /**
     * Round the minute to nearest tens
     *
     * @param object $datetime
     * @param int $precision
     *
     * @return object
     */
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
    /**
     * Round the minute to nearest tens
     *
     * @param object $datetime
     * @param int $precision
     *
     * @return object
     */
    function getPrefecture($index = null)
    {
    	$data = config('prefecture');

		if ($index) {
			return $data[$index] ?? null;
		}

		return collect($data);
    }
}