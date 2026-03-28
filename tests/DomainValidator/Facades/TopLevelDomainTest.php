<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Facades;

use Myerscode\Laravel\DomainValidator\Facades\TopLevelDomain;
use Tests\TestCase;
use Pdp\TopLevelDomains as PdpTopLevelDomain;

final class TopLevelDomainTest extends TestCase
{
    public function test_returns_an_instance_of_rules(): void
    {
        $this->assertInstanceOf(PdpTopLevelDomain::class, TopLevelDomain::fromString('# Version 2024041000, Last Updated Wed Apr 10 07:07:02 2024 UTC'));
    }
}
