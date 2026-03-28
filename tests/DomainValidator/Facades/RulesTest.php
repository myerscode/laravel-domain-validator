<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Facades;

use Myerscode\Laravel\DomainValidator\Facades\Rules;
use Tests\TestCase;
use Pdp\Rules as PdpRules;

final class RulesTest extends TestCase
{
    public function test_returns_an_instance_of_rules(): void
    {
        $this->assertInstanceOf(PdpRules::class, Rules::fromString(''));
    }
}
