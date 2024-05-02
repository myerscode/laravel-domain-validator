<?php

namespace Myerscode\Laravel\DomainValidator\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use function Myerscode\Laravel\DomainValidator\isTLD;

class IsTld implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!isTLD($value)) {
            $fail('domain-validator::validation.is_tld')->translate();
        }
    }
}
