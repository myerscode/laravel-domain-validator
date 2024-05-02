<?php

namespace Myerscode\Laravel\DomainValidator;

use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Repository;
use Pdp\Rules;
use Pdp\TopLevelDomains;

class RulesFactory
{
    public function createPublicSuffixRules(): Rules
    {
        $cachedRaw = $this->cacheStore()->get(config('domain-validator.public_suffix.cache_name'));

        return Rules::fromString($cachedRaw);
    }

    public function createTopLevelDomains(): TopLevelDomains
    {
        $cachedRaw = $this->cacheStore()->get(config('domain-validator.iana_tld.cache_name'));

        return TopLevelDomains::fromString($cachedRaw);
    }

    private function cacheStore(): Repository
    {
        return Cache::store(config('domain-validator.cache_driver'));
    }
}
