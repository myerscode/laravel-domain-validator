<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\IsTld;
use Iterator;

final class IsTldTest extends RulesTestCase
{
    public static function ruleTestProvider(): Iterator
    {
        yield 'is_tld success' => [
            'attribute' => 'tld',
            'inputs' => ['uk', '.com', 'com', 'io'],
            'constraints' => [new IsTld()],
            'valid' => true,
        ];
        yield 'is_tld fail' => [
            'attribute' => 'tld',
            'inputs' => ['corgi', '.co.rgi', 'co.uk'],
            'constraints' => [new IsTld()],
            'valid' => false,
            'message' => 'domain-validator::validation.is_tld',
        ];
    }
}
