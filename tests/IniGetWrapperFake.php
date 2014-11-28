<?php

/*
* (c) Andreas Fischer <af@bantuX.org>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace bantu\IniGetWrapper;

class IniGetWrapperFake extends IniGetWrapper
{
    protected function getPhp($varname)
    {
        return $varname;
    }
}
