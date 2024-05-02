<?php

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\IsTld;

class IsTldTest extends RulesTestCase
{

    public static function ruleTestProvider(): array
    {
        return [
            'is_tld success' => [
                'attribute' => 'tld',
                'inputs' => ['uk', '.com', 'com', 'io'],
                'constraints' => [new IsTld()],
                'valid' => true,
            ],
            'is_tld fail' => [
                'attribute' => 'tld',
                'inputs' => ['corgi', '.co.rgi', 'co.uk'],
                'constraints' => [new IsTld()],
                'valid' => false,
                'message' => 'domain-validator::validation.is_tld',
            ],
        ];
    }
}
