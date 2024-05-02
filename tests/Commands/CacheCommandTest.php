<?php

namespace Tests\Commands;

use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CacheCommandTest extends TestCase
{
    public function testCommand(): void
    {
        $this
            ->artisan('domain-validator:cache', [])
            ->expectsOutput('Caching data sets...')
            ->assertExitCode(0);

        $this->assertTrue(Cache::store(config('domain-validator.cache_driver'))->has(config('domain-validator.public_suffix.cache_name')));
        $this->assertTrue(Cache::store(config('domain-validator.cache_driver'))->has(config('domain-validator.iana_tld.cache_name')));
    }
}
