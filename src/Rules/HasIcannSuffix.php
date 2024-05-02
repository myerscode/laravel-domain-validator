<?php

namespace Myerscode\Laravel\DomainValidator\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use function Myerscode\Laravel\DomainValidator\hasICANNSuffix;

class HasIcannSuffix implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!hasICANNSuffix($value)) {
            $fail('domain-validator::validation.is_icann')->translate();
        }
    }
}
