# Laravel Nova Numeric  Field

A Laravel Nova field that automatically adds thousand separator. Perfect for currency, quantities, or any numeric input that needs better readability.

![Create Resource](image/numeric.png)

## Features
- Real-time thousand separator formatting (e.g., 1000 → 1.000)
- Works with copy/paste
- Maintains numeric value in database
- Compatible with Laravel Nova 4.x

## Requirements

- Laravel Nova 4.x or higher
- PHP 7.3 or higher

## Installation

You can install the package via composer:

```bash
composer require laravelwebdev/numeric
```

## Usage

```php
use Laravelwebdev\Numeric\Numeric;

public function fields(Request $request)
{
    return [
        Numeric::make('Price'),
    ];
}
```
To change the separator:
```php
use Laravelwebdev\Numeric\Numeric;

public function fields(Request $request)
{
    return [
        Numeric::make('Price')->separator(' '),
    ];
}
```
That will give you separate space while typing in the input field.

## License

The MIT License (MIT). 