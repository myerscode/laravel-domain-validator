<?php

namespace Tests\DomainValidator\Facades;

use Myerscode\Laravel\DomainValidator\Facades\TopLevelDomain;
use Tests\TestCase;
use Pdp\TopLevelDomains as PdpTopLevelDomain;

class TopLevelDomainTest extends TestCase
{
    public function testReturnsAnInstanceOfRules(): void
    {
        self::assertInstanceOf(PdpTopLevelDomain::class, TopLevelDomain::fromString('# Version 2024041000, Last Updated Wed Apr 10 07:07:02 2024 UTC'));
    }
}
