<?php

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\HasKnownSuffix;

class HasKnownSuffixTest extends RulesTestCase
{
    public static function ruleTestProvider(): array
    {
        return [
            'has_known_suffix success' => [
                'attribute' => 'known_suffix',
                'inputs' => ['myerscode.com', 'myerscode.co.uk', 'www.myerscode.dev', 'http://myerscode.dev', 'https://myerscode.dev'],
                'constraints' => [new HasKnownSuffix()],
                'valid' => true,
            ],
            'has_known_suffix fail' => [
                'attribute' => 'known_suffix',
                'inputs' => ['myerscode.corgi', 'http://myerscode.corgi', 'https://myerscode.corgi', 'myerscode.', 'myerscode.co.rgi'],
                'constraints' => [new HasKnownSuffix()],
                'valid' => false,
                'message' => 'domain-validator::validation.has_known_suffix',
            ],
        ];
    }
}
