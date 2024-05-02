<?php

namespace Tests\DomainValidator\Facades;

use Myerscode\Laravel\DomainValidator\Facades\Rules;
use Tests\TestCase;
use Pdp\Rules as PdpRules;

class RulesTest extends TestCase
{
    public function testReturnsAnInstanceOfRules(): void
    {
        self::assertInstanceOf(PdpRules::class, Rules::fromString(''));
    }
}
