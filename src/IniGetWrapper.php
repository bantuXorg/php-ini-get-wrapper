<?php

/*
* (c) Andreas Fischer <git@andreasfischer.net>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace bantu\IniGetWrapper;

/**
* Wrapper class around built-in ini_get() function.
*
* Provides easier handling of the different interpretations of ini values.
*/
class IniGetWrapper
{
    /**
    * Simple wrapper around ini_get()
    * See http://php.net/manual/en/function.ini-get.php
    *
    * @param string $varname  The configuration option name.
    * @return null|string     Null if configuration option does not exist.
    *                         The configuration option value (string) otherwise.
    */
    public function get($varname)
    {
        $value = $this->getPhp($varname);
        return $value === false ? null : $value;
    }

    /**
    * Gets the configuration option value as a trimmed string.
    *
    * @param string $varname  The configuration option name.
    * @return null|string     Null if configuration option does not exist.
    *                         The configuration option value (string) otherwise.
    */
    public function getString($varname)
    {
        $value = $this->get($varname);
        return $value === null ? null : trim($value);
    }

    /**
    * Gets configuration option value as a boolean.
    * Interprets the string value 'off' as false.
    *
    * @param string $varname  The configuration option name.
    * @return null|bool       Null if configuration option does not exist.
    *                         False if configuration option is disabled.
    *                         True otherwise.
    */
    public function getBool($varname)
    {
        $value = $this->getString($varname);
        return $value === null ? null : $value && strtolower($value) !== 'off';
    }

    /**
    * Gets configuration option value as an integer.
    *
    * @param string $varname  The configuration option name.
    * @return null|int|float  Null if configuration option does not exist or is not numeric.
    *                         The configuration option value (integer or float) otherwise.
    */
    public function getNumeric($varname)
    {
        $value = $this->getString($varname);
        return is_numeric($value) ? $value + 0 : null;
    }

    /**
    * Gets configuration option value in bytes.
    * Converts strings like '128M' to bytes (integer or float).
    *
    * @param string $varname  The configuration option name.
    * @return null|int|float  Null if configuration option does not exist or is not well-formed.
    *                         The configuration option value as bytes (integer or float) otherwise.
    */
    public function getBytes($varname)
    {
        $value = $this->getString($varname);

        if ($value === null) {
            return null;
        }

        if (is_numeric($value)) {
            // Already in bytes.
            return $value + 0;
        }

        if (strlen($value) < 2 || strlen($value) < 3 && $value[0] === '-') {
            // Either a single character
            // or two characters where the first one is a minus.
            return null;
        }

        $value_lower = strtolower($value);
        $value_numeric = $value + 0;

        switch ($value_lower[strlen($value_lower) - 1]) {
            case 'g':
                $value_numeric *= 1024;
                // no break
            case 'm':
                $value_numeric *= 1024;
                // no break
            case 'k':
                $value_numeric *= 1024;
                break;

            default:
                // It's not already in bytes (and thus numeric)
                // and does not carry a unit.
                return null;
        }

        return $value_numeric;
    }

    protected function getPhp($varname)
    {
        return ini_get($varname);
    }
}
