<?php

namespace Myerscode\Laravel\DomainValidator\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use function Myerscode\Laravel\DomainValidator\hasPrivateSuffix;

class HasPrivateSuffix implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!hasPrivateSuffix($value)) {
            $fail('domain-validator::validation.has_private_suffix')->translate();
        }
    }
}
