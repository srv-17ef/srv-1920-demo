<?php

$countries = ["th", "th", "th", "gb"];


/**
 * Räkna och returnera antalet unika i en array
 * @param array $countries
 * @return array
 */
function getUnique(array $countries)
{
    $uniqueCountries = [];
    foreach ($countries as $country) {
        if (key_exists($country, $uniqueCountries)) {
            $uniqueCountries[$country]++;
        } else {
            $uniqueCountries[$country] = 1;
        }
    }
    return $uniqueCountries;
}

var_dump(getUnique($countries));