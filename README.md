[![Build Status](https://travis-ci.org/bantu/php-ini-get-wrapper.svg?branch=master)](https://travis-ci.org/bantu/php-ini-get-wrapper)
[![Code Coverage](https://scrutinizer-ci.com/g/bantu/php-ini-get-wrapper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bantu/php-ini-get-wrapper/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantu/php-ini-get-wrapper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantu/php-ini-get-wrapper/?branch=master)

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
