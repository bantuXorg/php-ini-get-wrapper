[![Travis Build Status](https://travis-ci.org/bantuXorg/php-ini-get-wrapper.svg?branch=master)](https://travis-ci.org/bantuXorg/php-ini-get-wrapper)
[![Scrutinizer Build Status](https://scrutinizer-ci.com/g/bantuXorg/php-ini-get-wrapper/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantuXorg/php-ini-get-wrapper/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/bantuXorg/php-ini-get-wrapper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bantuXorg/php-ini-get-wrapper/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantuXorg/php-ini-get-wrapper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantuXorg/php-ini-get-wrapper/?branch=master)

# Usage

```php
require __DIR__ . '/vendor/autoload.php';
$ini = new bantu\IniGetWrapper\IniGetWrapper;
var_dump(
  $ini->getString('does-not-exist'),
  $ini->getString('default_mimetype'),
  $ini->getBool('display_errors'),
  $ini->getNumeric('precision'),
  $ini->getBytes('memory_limit')
);
```

```
NULL
string(9) "text/html"
bool(false)
int(14)
int(134217728)
```
