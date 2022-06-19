<?php

namespace RandomDataGenerator\Providers\Defaults;

use RandomDataGenerator\Generator;

class BaseProvider
{
    /**
     * @var \RandomDataGenerator\Generator
     */
    protected $generator;

    /**
     * @param \RandomDataGenerator\Generator $generator
     */
    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Return a random digit (0-9)
     *
     * @param int $min
     * @param int $max
     *
     * @return int
     */
    public static function randomDigit(int $min = 0, int $max = 9): int
    {
        return mt_rand($min, $max);
    }

    /**
     * Return a digit that is not 0 (i.e. 1-9)
     *
     * @return int
     */
    public static function randomNonZeroDigit(): int
    {
        return self::randomDigit(1, 9);
    }

    /**
     * Return a random integer between two given integers
     *
     * @param int $boundOne
     * @param int $boundTwo
     *
     * @return int
     */
    public static function numberBetween(int $boundOne = 0, int $boundTwo = 2147483647): int
    {
        $min = ($boundOne < $boundTwo) ? $boundOne : $boundTwo;
        $max = ($boundOne < $boundTwo) ? $boundTwo : $boundOne;

        return mt_rand($min, $max);
    }

    /**
     * Return a lowercase version of the passed string
     *
     * @param string $string
     * @return string
     */
    public static function toLower(string $string = ''): string
    {
        // @TODO: Maybe implement a check for UTF-8 with mbstring?
        return strtolower($string);
    }

    /**
     * Return an uppercase version fo the passed string
     *
     * @param string $string
     * @return string
     */
    public static function toUpper(string $string = ''): string
    {
        // @TODO: Maybe implement a check for UTF-8 with mbstring?
        return strtoupper($string);
    }


    /**
     * Get one random element from the given array
     *
     * @param array $array
     * @return mixed
     */
    public static function getRandomElement(array $array = [])
    {
        if (!$array || ($array instanceof \Traversable && !count($array)))
            return null;

        $elements = static::getRandomElements($array, 1);
        return $elements[0];
    }

    /**
     * Return an array (of length $returnCount) of random elements from the given array ($array)
     *
     * @param array $array              Given array of elements to select from
     * @param int $returnCount          Number of elements to return
     * @param bool $allowDuplicates     Allow the same elements to be selected multiple times
     * @return array                    Array of selected elements
     * @throws \LengthException
     */
    public static function getRandomElements(array $array = [], int $returnCount = 1, $allowDuplicates = false): array
    {
        $traverables = [];

        if ($array instanceof \Traversable) {
            foreach ($array as $element) {
                $traverables[] = $element;
            }
        }

        $workingArray = count($traverables) ? $traverables : $array;

        $arrayKeys = array_keys($workingArray);
        $keyCount = count($arrayKeys);

        if (!$allowDuplicates && $keyCount < $returnCount)
            throw new \LengthException(sprintf("Cannot return %d elements as there are only %d elements in the given array", $returnCount, $keyCount));

        $highestKey = $keyCount - 1;
        $elementCount = 0;
        $keys = $elements = [];

        while ($elementCount < $returnCount) {
            $index = mt_rand(0, $highestKey);

            if (!$allowDuplicates) {
                if (isset($keys[$index]))
                    continue;

                $keys[$index] = true;
            }

            $elements[] = $workingArray[$arrayKeys[$index]];
            $elementCount++;
        }

        return $elements;
    }
}