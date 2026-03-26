<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Facades;

use Myerscode\Laravel\DomainValidator\Facades\Suffix;
use Tests\TestCase;
use Pdp\Suffix as PdpSuffix;

final class SuffixTest extends TestCase
{
    public function testReturnsAnInstanceOfRules(): void
    {
        $this->assertInstanceOf(PdpSuffix::class, Suffix::fromUnknown('com'));
    }
}
