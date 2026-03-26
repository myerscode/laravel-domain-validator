<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\HasIcannSuffix;
use Iterator;

final class HasIcannSuffixTest extends RulesTestCase
{
    public static function ruleTestProvider(): Iterator
    {
        yield 'is_icann success' => [
            'attribute' => 'icann',
            'inputs' => ['myerscode.com', 'myerscode.co.uk', 'www.myerscode.dev', 'http://myerscode.dev', 'https://myerscode.dev'],
            'constraints' => [new HasIcannSuffix()],
            'valid' => true,
        ];
        yield 'is_icann fail' => [
            'attribute' => 'icann',
            'inputs' => ['cloudfront.net'],
            'constraints' => [new HasIcannSuffix()],
            'valid' => false,
            'message' => 'domain-validator::validation.is_icann',
        ];
    }

}
