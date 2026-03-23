<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Facades;

use Myerscode\Laravel\DomainValidator\Facades\Rules;
use Tests\TestCase;
use Pdp\Rules as PdpRules;

final class RulesTest extends TestCase
{
    public function testReturnsAnInstanceOfRules(): void
    {
        $this->assertInstanceOf(PdpRules::class, Rules::fromString(''));
    }
}
