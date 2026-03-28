# Laravel Domain Validator
> A Laravel package for validating domain properties

[![Latest Stable Version](https://poser.pugx.org/myerscode/laravel-domain-validator/v/stable)](https://packagist.org/packages/myerscode/laravel-domain-validator)
[![Total Downloads](https://poser.pugx.org/myerscode/laravel-domain-validator/downloads)](https://packagist.org/packages/myerscode/laravel-domain-validator)
[![PHP Version Require](http://poser.pugx.org/myerscode/laravel-domain-validator/require/php)](https://packagist.org/packages/myerscode/laravel-domain-validator)
[![License](https://poser.pugx.org/myerscode/laravel-domain-validator/license)](https://github.com/myerscode/laravel-domain-validator/blob/main/LICENSE)
[![Tests](https://github.com/myerscode/laravel-domain-validator/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/myerscode/laravel-domain-validator/actions/workflows/tests.yml)
[![codecov](https://codecov.io/gh/myerscode/laravel-domain-validator/graph/badge.svg)](https://codecov.io/gh/myerscode/laravel-domain-validator)

## Requirements

- PHP ^8.5
- Laravel ^13.0

## Why is this useful?

It allows easy integration of the [PHP Domain Parser](https://github.com/jeremykendall/php-domain-parser) PHP Domain Parser
by [Jeremy Kendall](https://github.com/jeremykendall) into a Laravel app, in order to validate values against known
domain data.

## Installation

The package can be installed via composer:

```bash
composer require myerscode/laravel-domain-validator
```

## Usage

Fetch data sets
```php
artisan domain-validator:fetch
```

Cache the fetched data sets
```php
artisan domain-validator:cache
```

Do both together!
```php
artisan domain-validator:refresh
```

## Scheduling

It is recommended to schedule the refresh command, in order to remove the need of running the `domain-validator:refresh` command
every time you need to update your cache.

```php
// routes/console.php

Schedule::call('domain-validator:refresh')->daily();

// alternatively initialize a new command class

Schedule::call(new \Myerscode\Laravel\DomainValidator\Commands\RefreshCommand)->daily();
```

## Checks

Note: For developer experience, all strings passed will be sanitized to remove trailing slashes `/` and `http(s)://`.

### Has ICANN Suffix
> Tells whether the effective TLD has a matching rule in a Public Suffix List ICANN Section.

```php
hasICANNSuffix('myerscode.com') // true

hasICANNSuffix('cloudfront.net') // false
```

### Has Known Suffix
> Tells whether the effective TLD has a matching rule in a Public Suffix List.

```php
hasKnownSuffix('myerscode.co') // true

hasKnownSuffix('myerscode.corgi') // false
```

### Has Private Suffix
> Tells whether the effective TLD has a matching rule in a Public Suffix List Private Section.

```php
hasPrivateSuffix('myerscode.cloudfront.net') // true

hasPrivateSuffix('cloudfront.net') // false
```

### Is Domain
> Is the value parseable as to a valid domain

```php
isDomain('myerscode.com') // true

isDomain('.com') // false
```

### Is TLD
> Is the value a valid Top Level Domain

```php
isTld('.com') // true

isTld('.corgi') // false
```

## Issues

Bug reports and feature requests can be submitted on the [Github Issue Tracker](https://github.com/myerscode/laravel-domain-validator/issues).

## Contributing

We are very happy to receive pull requests to add functionality or fixes. Please read the Myerscode [contributing](https://github.com/myerscode/docs/blob/main/CONTRIBUTING.md) guide for information.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
