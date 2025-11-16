<?php

namespace Tests\DomainValidator\Rules;

use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

abstract class RulesTestCase extends TestCase
{
    abstract public static function ruleTestProvider();

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

            self::assertSame($valid, $validator->passes(), $input);

            if (!$valid) {
                self::assertSame($this->getValidationMessage($message, $attribute), $validator->messages()->first());
            }
        }
    }
}
