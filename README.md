<p align="center">
<a href="https://packagist.org/packages/zaxn1234/random-data-generator"><img src="https://img.shields.io/packagist/dt/zaxn1234/random-data-generator" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/zaxn1234/random-data-generator"><img src="https://img.shields.io/packagist/v/zaxn1234/random-data-generator" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/zaxn1234/random-data-generator"><img src="https://img.shields.io/packagist/l/zaxn1234/random-data-generator" alt="License"></a>
</p>

# RandomDataGenerator
A package to generate psuedo-random data for testing

## Installation
### Download
- Download a ZIP or clone the repo
- Make sure to have `require_once path/to/src/autoload.php` (edited as needed) to the start of your PHP script(s).

### Composer
A simple `composer require zaxn1234/random-data-generator` should do the trick!

## Usage
See `examples` folder. These will be updated alongside development.
It's very simple! Just:
 - `require_once` the `src/autoload.php` file in your script(s)
 - `use RandomDataGenerator\Factory;`
 - Create a factory with `$factory = Factory::create();`
 - Grab whatever data you need, such as `$factory->lastName;`

## License
This library is open-sourced software licensed under the [MIT license](LICENSE.md).

## To-dos
Since we're early in development, this list is a vague cross-section of the things I'd like to add to this library.

### Add Providers
- [x] Names
- [x] Address
- [ ] Phone Numbers
- [ ] Date/Time
- [ ] Countries
- [ ] Internet
- [ ] Barcodes && UUIDs
- [ ] Random Text (Lorem ipsum-esque)
- [ ] Company Details
- [ ] And more...

### Add Locales
- [x] en_GB (Default locale)
- [ ] en_US
- [ ] de_DE
- [ ] es_ES
- [ ] fr_FR
- [ ] it_IT
- [ ] And more...

### Other Features
- [ ] Optionally Weighted Options
- [ ] Validation (IBAN, EAN etc.)
- [ ] Uniqueness