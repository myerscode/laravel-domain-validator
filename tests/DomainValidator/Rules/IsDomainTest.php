<?php

namespace Tests\DomainValidator\Rules;

use Myerscode\Laravel\DomainValidator\Rules\IsDomain;

class IsDomainTest extends RulesTestCase
{
    public static function ruleTestProvider(): array
    {
        return [
            'is_domain_name success' => [
                'attribute' => 'domain_name',
                'inputs' => ['myerscode.com', 'www.myerscode.com', 'http://myerscode.com', 'https://myerscode.com', 'myerscode.com/', 'myerscode.com////'],
                'constraints' => [new IsDomain()],
                'valid' => true,
            ],
            'is_domain_name fails' => [
                'attribute' => 'domain_name',
                'inputs' => ['#749.com', '.com', '.', 'corgi', 'http://', 'www.'],
                'constraints' => [new IsDomain()],
                'valid' => false,
                'message' => 'domain-validator::validation.is_domain',
            ],
        ];
    }
}
