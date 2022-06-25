<?php

namespace RandomDataGenerator;

class Factory
{
    const DEFAULT_LOCALE = 'en_GB';

    protected static array $defaultProviders = ['person', 'address'];

    public static function create($locale = self::DEFAULT_LOCALE)
    {
        $generator = new Generator();

        foreach (static::$defaultProviders as $provider) {
            $providerClassName = self::getProviderClassName($provider, $locale);
            $generator->addProvider(new $providerClassName($generator));
        }

        return $generator;
    }

    private static function getProviderClassName($provider, $locale = self::DEFAULT_LOCALE)
    {
        if ($providerClass = self::findProviderClassName($provider, $locale)) {
            return $providerClass;
        }

        // If no locale, we need to fallback
        if ($providerClass = self::findProviderClassName($provider)) {
            return $providerClass;
        }

        throw new \InvalidArgumentException(sprintf("Provider '%s' with locale '%s' cannot be found", $provider, $locale));
    }

    private static function findProviderClassName($provider, $locale = '')
    {
        $className = 'RandomDataGenerator\\' . ($locale ? sprintf('Providers\%s\%s', $locale, $provider) : sprintf('Providers\%s', $provider));
        if (class_exists($className, true))
            return $className;
    }
}