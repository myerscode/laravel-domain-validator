<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\HasKnownSuffix;
use Iterator;

final class HasKnownSuffixTest extends RulesTestCase
{
    public static function ruleTestProvider(): Iterator
    {
        yield 'has_known_suffix success' => [
            'attribute' => 'known_suffix',
            'inputs' => ['myerscode.com', 'myerscode.co.uk', 'www.myerscode.dev', 'http://myerscode.dev', 'https://myerscode.dev'],
            'constraints' => [new HasKnownSuffix()],
            'valid' => true,
        ];
        yield 'has_known_suffix fail' => [
            'attribute' => 'known_suffix',
            'inputs' => ['myerscode.corgi', 'http://myerscode.corgi', 'https://myerscode.corgi', 'myerscode.', 'myerscode.co.rgi'],
            'constraints' => [new HasKnownSuffix()],
            'valid' => false,
            'message' => 'domain-validator::validation.has_known_suffix',
        ];
    }
}
