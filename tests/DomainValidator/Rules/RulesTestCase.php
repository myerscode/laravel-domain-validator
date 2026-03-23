<?php

declare(strict_types=1);

namespace Tests\DomainValidator\Rules;

use Illuminate\Support\Facades\Validator;
use Iterator;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

abstract class RulesTestCase extends TestCase
{
    abstract public static function ruleTestProvider(): Iterator;

    /**
     * @param  ?string  $message  null
     */
    #[DataProvider('ruleTestProvider')]
    public function testValidator(
        string $attribute,
        string|array $inputs,
        array $constraints,
        bool $valid,
        ?string $message = null
    ): void {

        if (is_string($inputs)) {
            $inputs = [$inputs];
        }

        foreach ($inputs as $input) {
            $validator = Validator::make([$attribute => $input], [$attribute => $constraints]);

            $this->assertSame($valid, $validator->passes(), $input);

            if (!$valid) {
                $this->assertSame($this->getValidationMessage($message, $attribute), $validator->messages()->first());
            }
        }
    }
}
