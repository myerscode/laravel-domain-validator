<?php

namespace Tests\DomainValidator\Facades;

use Myerscode\Laravel\DomainValidator\Facades\Suffix;
use Tests\TestCase;
use Pdp\Suffix as PdpSuffix;

class SuffixTest extends TestCase
{
    public function testReturnsAnInstanceOfRules(): void
    {
        self::assertInstanceOf(PdpSuffix::class, Suffix::fromUnknown('com'));
    }
}
