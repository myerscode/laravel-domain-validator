<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\IsDomain;
use Iterator;

final class IsDomainTest extends RulesTestCase
{
    public static function ruleTestProvider(): Iterator
    {
        yield 'is_domain_name success' => [
            'attribute' => 'domain_name',
            'inputs' => ['myerscode.com', 'www.myerscode.com', 'http://myerscode.com', 'https://myerscode.com', 'myerscode.com/', 'myerscode.com////'],
            'constraints' => [new IsDomain()],
            'valid' => true,
        ];
        yield 'is_domain_name fails' => [
            'attribute' => 'domain_name',
            'inputs' => ['#749.com', '.com', '.', 'corgi', 'http://', 'www.'],
            'constraints' => [new IsDomain()],
            'valid' => false,
            'message' => 'domain-validator::validation.is_domain',
        ];
    }
}
