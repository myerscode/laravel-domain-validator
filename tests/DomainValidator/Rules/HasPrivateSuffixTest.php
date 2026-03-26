<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\HasPrivateSuffix;
use Iterator;

final class HasPrivateSuffixTest extends RulesTestCase
{
    public static function ruleTestProvider(): Iterator
    {
        yield 'has_private_suffix success' => [
            'attribute' => 'private',
            'inputs' => ['myerscode.cloudfront.net', 'http://myerscode.cloudfront.net', 'https://myerscode.cloudfront.net'],
            'constraints' => [new HasPrivateSuffix()],
            'valid' => true,
        ];
        yield 'has_private_suffix fail' => [
            'attribute' => 'private',
            'inputs' => ['myerscode.com', 'cloudfront.net', 'http://cloudfront.net', 'https://cloudfront.net'],
            'constraints' => [new HasPrivateSuffix()],
            'valid' => false,
            'message' => 'domain-validator::validation.has_private_suffix',
        ];
    }
}
