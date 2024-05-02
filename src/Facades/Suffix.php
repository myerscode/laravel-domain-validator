<?php

namespace Myerscode\Laravel\DomainValidator\Facades;

use Illuminate\Support\Facades\Facade;
use Pdp\Suffix as PdpSuffix;

/**
 * @mixin PdpSuffix
 */
class Suffix extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ldv.suffix';
    }
}
