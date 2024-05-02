<?php

namespace Myerscode\Laravel\DomainValidator\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use function Myerscode\Laravel\DomainValidator\hasKnownSuffix;

class HasKnownSuffix implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!hasKnownSuffix($value)) {
            $fail('domain-validator::validation.has_known_suffix')->translate();
        }
    }
}
