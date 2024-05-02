<?php

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\HasIcannSuffix;

class HasIcannSuffixTest extends RulesTestCase
{
    public static function ruleTestProvider(): array
    {
        return [
            'is_icann success' => [
                'attribute' => 'icann',
                'inputs' => ['myerscode.com', 'myerscode.co.uk'],
                'constraints' => [new HasIcannSuffix()],
                'valid' => true,
            ],
            'is_icann fail' => [
                'attribute' => 'icann',
                'inputs' => ['cloudfront.net'],
                'constraints' => [new HasIcannSuffix()],
                'valid' => false,
                'message' => 'domain-validator::validation.is_icann',
            ],
        ];
    }

}
