<?php

namespace RandomDataGenerator\Providers\Defaults;

class Person extends BaseProvider
{
    // @TODO: Switch to enum? (requires PHP8.1)
    // @TODO: Implement Non-binary options
    const GENDER_MALE = 'Male';
    const GENDER_FEMALE = 'Female';

    protected static $maleFirstNames = ['John'];
    protected static $femaleFirstNames = ['Jane'];
    protected static $lastNames = ['Smith'];

    protected static $firstNameFormat = ['{{maleFirstName}}', '{{femaleFirstName}}'];
    protected static $maleNameFormats = ['{{maleFirstName}} {{lastName}}',];
    protected static $femaleNameFormats = ['{{femaleFirstName}} {{lastName}}',];

    protected static $maleTitles = ['Mr.', 'Dr.', 'Prof.'];
    protected static $femaleTitles = ['Miss.', 'Ms.', 'Mrs.', 'Dr.', 'Prof.'];
    protected static $titleFormat = ['{{maleTitles}}', '{{femaleTitles}}'];

    /**
     * Return a generated name (e.g. John Smith)
     *
     * @param string $gender
     * @return string
     */
    public function name($gender = '')
    {
        switch (strtolower($gender)) {
            case self::GENDER_MALE:
                $format = static::getRandomElement(static::$maleNameFormats);
                break;
            case self::GENDER_FEMALE:
                $format = static::getRandomElement(static::$femaleNameFormats);
                break;
            default:
                $format = static::getRandomElement(array_merge(static::$maleNameFormats, static::$femaleNameFormats));
                break;
        }

        return $this->generator->parse($format);
    }

    /**
     * Return a generated first name
     *
     * @param string $gender
     * @return string
     */
    public function firstName(string $gender = '')
    {
        switch (strtolower($gender)) {
            case self::GENDER_MALE:
                return static::maleFirstName();
            case self::GENDER_FEMALE:
                return static::femaleFirstName();
            default:
                return static::anyFirstName();
        }
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
    public function title(string $gender = '')
    {
        switch (strtolower($gender)) {
            case self::GENDER_MALE:
                return static::maleTitle();
            case self::GENDER_FEMALE:
                return static::femaleTitle();
            default:
                return static::anyTitle();
        }
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