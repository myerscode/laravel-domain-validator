<?php

namespace Myerscode\Laravel\DomainValidator\Facades;

use Illuminate\Support\Facades\Facade;
use Pdp\TopLevelDomains;

/**
 * @mixin TopLevelDomains
 */
class TopLevelDomain extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ldv.tld';
    }
}
