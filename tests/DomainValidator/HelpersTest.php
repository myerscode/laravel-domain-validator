<?php

namespace Tests\DomainValidator;

use Exception;
use Myerscode\Laravel\DomainValidator\Facades\Rules;
use Myerscode\Laravel\DomainValidator\Facades\Suffix;
use Myerscode\Laravel\DomainValidator\Facades\TopLevelDomain;
use Tests\TestCase;

use function Myerscode\Laravel\DomainValidator\hasICANNSuffix;
use function Myerscode\Laravel\DomainValidator\hasKnownSuffix;
use function Myerscode\Laravel\DomainValidator\hasPrivateSuffix;
use function Myerscode\Laravel\DomainValidator\isDomain;
use function Myerscode\Laravel\DomainValidator\isTLD;

class HelpersTest extends TestCase
{
    protected function makeFacadesFails(): void
    {
        $throwException = new class {
            public function __call(string $method, array $parameters)
            {
                throw new Exception();
            }
        };

        Rules::swap($throwException);
        Suffix::swap($throwException);
        TopLevelDomain::swap($throwException);
    }

    public function testRuleReturnsFalseIfException(): void
    {
        $this->makeFacadesFails();

       $this->assertFalse( hasICANNSuffix(''));
       $this->assertFalse( hasKnownSuffix(''));
       $this->assertFalse( hasPrivateSuffix(''));
       $this->assertFalse( isDomain(''));
       $this->assertFalse( isTLD(''));
    }
}
