<?php

namespace RandomDataGenerator\Providers\Defaults;

class Person extends BaseProvider
{
    // @TODO: Switch to enum? (requires PHP8.1)
    // @TODO: Implement Non-binary options
    const GENDER_MALE = 'Male';
    const GENDER_FEMALE = 'Female';

    protected static array $maleFirstNames = ['John'];
    protected static array $femaleFirstNames = ['Jane'];
    protected static array $lastNames = ['Smith'];

    protected static array $firstNameFormat = ['{{maleFirstName}}', '{{femaleFirstName}}'];
    protected static array $maleNameFormats = ['{{maleFirstName}} {{lastName}}',];
    protected static array $femaleNameFormats = ['{{femaleFirstName}} {{lastName}}',];

    protected static array $maleTitles = ['Mr.', 'Dr.', 'Prof.'];
    protected static array $femaleTitles = ['Miss.', 'Ms.', 'Mrs.', 'Dr.', 'Prof.'];
    protected static array $titleFormat = ['{{maleTitles}}', '{{femaleTitles}}'];

    /**
     * Return a generated name (e.g. John Smith)
     *
     * @param string $gender
     * @return string
     */
    public function name(string $gender = ''): string
    {
        $format = match (strtolower($gender)) {
            self::GENDER_MALE => static::getRandomElement(static::$maleNameFormats),
            self::GENDER_FEMALE => static::getRandomElement(static::$femaleNameFormats),
            default => static::getRandomElement(array_merge(static::$maleNameFormats, static::$femaleNameFormats)),
        };

        return $this->generator->parse($format);
    }

    /**
     * Return a generated first name
     *
     * @param string $gender
     * @return string
     */
    public function firstName(string $gender = ''): string
    {
        return match (strtolower($gender)) {
            self::GENDER_MALE => static::maleFirstName(),
            self::GENDER_FEMALE => static::femaleFirstName(),
            default => static::anyFirstName(),
        };
    }

    /**
     * Return a generated male first name
     *
     * @return string
     */
    public static function maleFirstName(): string
    {
        return static::getRandomElement(static::$maleFirstNames);
    }

    /**
     * Return a generated female first name
     *
     * @return string
     */
    public static function femaleFirstName(): string
    {
        return static::getRandomElement(static::$femaleFirstNames);
    }

    /**
     * Return a first name of any gender
     *
     * @return string
     */
    public static function anyFirstName(): string
    {
        return static::getRandomElement(array_merge(static::$maleFirstNames, static::$femaleFirstNames));
    }

    /**
     * Return a generated last name
     *
     * @return string
     */
    public function lastName(): string
    {
        return static::getRandomElement(static::$lastNames);
    }

    /**
     * Return a generated title
     *
     * @param string $gender
     */
    public function title(string $gender = ''): string
    {
        return match (strtolower($gender)) {
            self::GENDER_MALE => static::maleTitle(),
            self::GENDER_FEMALE => static::femaleTitle(),
            default => static::anyTitle(),
        };
    }

    /**
     * Return a male title
     *
     * @return string
     */
    public function maleTitle(): string
    {
        return static::getRandomElement(static::$maleTitles);
    }

    /**
     * Return a female title
     *
     * @return string
     */
    public function femaleTitle(): string
    {
        return static::getRandomElement(static::$femaleTitles);
    }

    /**
     * Return any title
     *
     * @return string
     */
    public function anyTitle(): string
    {
        return static::getRandomElement(array_merge(static::$maleTitles, static::$femaleTitles));
    }
}