<?php

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\HasPrivateSuffix;

class HasPrivateSuffixTest extends RulesTestCase
{
    public static function ruleTestProvider(): array
    {
        return [
            'has_private_suffix success' => [
                'attribute' => 'private',
                'inputs' => ['myerscode.cloudfront.net'],
                'constraints' => [new HasPrivateSuffix()],
                'valid' => true,
            ],
            'has_private_suffix fail' => [
                'attribute' => 'private',
                'inputs' => ['myerscode.com', 'cloudfront.net'],
                'constraints' => [new HasPrivateSuffix()],
                'valid' => false,
                'message' => 'domain-validator::validation.has_private_suffix',
            ],
        ];
    }
}
