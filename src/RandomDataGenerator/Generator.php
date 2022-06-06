<?php

namespace RandomDataGenerator;

class Generator 
{
  protected $providers = [];
  protected $formatters = [];

  /**
   * Return the providers array
   * 
   * @return array
   */
  public function getProviders()
  {
    return $this->providers;
  }

  /**
   * Add a provider
   * 
   * @param $provder
   */
  public function addProvider($provider)
  {
    array_unshift($this->providers, $provider);
  }

  /**
   * Get a formatter
   * 
   * @param $formatter
   * @return string|object
   * @throws \InvalidArgumentException
   */
  public function getFormatter($formatter)
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
   */
  public function format($formatter, $args = [])
  {
    return call_user_func_array($this->getFormatter($formatter), $args);
  }

  /**
   * Parse a string (using PREG)
   * 
   * @param string $string
   */
  public function parse(string $string)
  {
    return preg_replace_callback('/\{\{\s?(\w+)\s?\}\}/u', [$this, 'formatWithMatches'], $string);
  }

  /**
   * @param array $matches
   */
  private function formatWithMatches(array $matches)
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