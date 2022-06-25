<?php

namespace RandomDataGenerator;

class Generator
{
    protected array $providers = [];
    protected array $formatters = [];

    /**
     * Return the providers array
     *
     * @return array
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

    /**
     * Add a provider
     *
     * @param $provider
     */
    public function addProvider($provider)
    {
        array_unshift($this->providers, $provider);
    }

    /**
     * Get a formatter
     *
     * @param $formatter
     * @return string|object|array
     * @throws \InvalidArgumentException
     */
    public function getFormatter($formatter): object|array|string
    {
        if (isset($this->formatters[$formatter]))
            return $this->formatters[$formatter];

        foreach ($this->providers as $provider) {
            if (method_exists($provider, $formatter)) {
                $this->formatters[$formatter] = [$provider, $formatter];

                return $this->formatters[$formatter];
            }
        }

        throw new \InvalidArgumentException(sprintf("Formatter '%s' not found", $formatter));
    }

    /**
     * @param $formatter
     * @param array $args
     * @return false|mixed
     */
    public function format($formatter, array $args = []): mixed
    {
        return call_user_func_array($this->getFormatter($formatter), $args);
    }

    /**
     * Parse a string (using PREG)
     *
     * @param string $string
     * @return array|string|null
     */
    public function parse(string $string): array|string|null
    {
        return preg_replace_callback('/\{\{\s?(\w+)\s?\}\}/u', [$this, 'formatWithMatches'], $string);
    }

    /**
     * @param array $matches
     * @return false|mixed
     */
    private function formatWithMatches(array $matches): mixed
    {
        return $this->format($matches[1]);
    }

    /**
     * Set the seed
     *
     * @param $seed
     */
    public function seed($seed = null)
    {
        if (!isset($seed)) {
            mt_srand();
            return;
        }

        mt_srand((int) $seed);
    }

    public function __call($method, $attributes)
    {
        return $this->format($method, $attributes);
    }

    public function __destruct()
    {
        $this->seed();
    }

    public function __get($attribute)
    {
        return $this->format($attribute);
    }

    public function __wakeup()
    {
        $this->formatters = [];
    }
}