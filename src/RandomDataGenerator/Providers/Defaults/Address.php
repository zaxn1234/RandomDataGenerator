<?php

namespace RandomDataGenerator\Providers\Defaults;

use Exception;

class Address extends BaseProvider
{
    // Country name for the locale (commonly used short name)
    //  E.g. United Kingdom
    protected static string $country = '';

    // Full country 'formal' name
    //  E.g. United Kingdom of Great Britain and Northern Ireland
    protected static string $countryFullName = '';

    // A list of cities/towns/villages within the locale
    protected static array $cities = [];

    // A list of states (e.g. US), counties (e.g. UK) or other administrative areas within the locale
    protected static array $administrativeAreas = [];

    // A list of postal code areas or zip/area codes if the locale uses those instead
    protected static array $postcodes = [];

    // A list of names for streets without the suffix
    //  E.g. First (not First Avenue)
    protected static array $streetNames = [];

    // A list of street suffixes (e.g. Avenue, Road, Lane etc.)
    protected static array $streetSuffixes = [];

    // A list of smaller areas within a city
    protected static array $localities = [];

    /**
     * @param string|null $city
     * @return object
     * @throws Exception
     */
    public function fullAddress(string $city = null): object
    {
        if (!isset($city)) {
            $city = $this->city();
        }

        $locality = $this->locality($city);
        $area = $this->administrativeArea($city);
        $postcode = $this->postcode($city, $locality);

        return (object) [
            $this->street(),
            $locality,
            $city,
            $postcode,
            $area,
            strtoupper(static::$country)
        ];
    }

    /**
     * @return string
     * @throws Exception
     */
    public function fullAddressString(): string
    {
        $string = '';
        $address = $this->fullAddress();

        foreach ($address as $key => $value) {
            $string .= "$value\n";
        }

        // Remove trailing comma and return
        return substr($string, 0 ,-1);
    }

    /**
     * @return string
     */
    public function city(): string
    {
        return static::getRandomElement(static::$cities);
    }

    /**
     * @param string|null $city
     * @return string
     * @throws Exception
     */
    public function administrativeArea(string $city = null): string
    {
        if (!isset($city)) {
            $city = $this->city();
        }

        foreach (static::$administrativeAreas as $area => $cities) {
            foreach ($cities as $c) {
                if ($c === $city) {
                    return $area;
                }
            }
        }

        throw new Exception("Could not generate an administrative area. Please check the locale file is set up correctly.");
    }

    /**
     * @param int $minStreetNumber
     * @param int $maxStreetNumber
     * @return string
     */
    public function street(int $minStreetNumber = 1, int $maxStreetNumber = 100): string
    {
        $streetName = static::getRandomElement(static::$streetNames);
        $streetSuffix = static::getRandomElement(static::$streetSuffixes);
        $streetNumber = mt_rand($minStreetNumber, $maxStreetNumber);

        return "$streetNumber $streetName $streetSuffix";
    }

    /**
     * @param string|null $city
     * @return string
     * @throws Exception
     */
    public function locality(string $city = null): string
    {
        if (!isset($city)) {
            $city = $this->city();
        }

        if (isset(static::$localities[$city])) {
            return static::getRandomElement(static::$localities[$city]);
        }

        throw new Exception("Could not generate a locality from city: '$city'");
    }

    /**
     * Generate a random postcode
     *
     * @param string|null $city
     * @param string|null $locality
     * @return string
     * @throws Exception
     */
    public function postcode(string $city = null, string $locality = null): string
    {
        if (!isset($city)) {
            $city = $this->city();
        }

        if (!isset($locality)) {
            $locality = $this->locality($city);
        }

        if (isset(static::$postcodes[$city][$locality])) {
            $letter = static::getRandomElement(range(0,9));
            $numberOne = static::getRandomElement(range("A", "Z"));
            $numberTwo = static::getRandomElement(range("A", "Z"));
            $postcodeSuffix = "$letter$numberOne$numberTwo";

            return static::getRandomElement(static::$postcodes[$city][$locality]) . " $postcodeSuffix";
        }

        throw new Exception("Could not generate a postcode from the city: '$city' and the locality: '$locality' . Please check the locale file is set up correctly.");
    }
}