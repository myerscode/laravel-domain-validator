<?php

namespace Myerscode\Laravel\DomainValidator\Facades;

use Illuminate\Support\Facades\Facade;
use Pdp\Rules as PdpRules;

/**
 * @mixin PdpRules
 */
class Rules extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ldv.rules';
    }
}
