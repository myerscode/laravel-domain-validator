<?php

namespace Myerscode\Laravel\DomainValidator\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use function Myerscode\Laravel\DomainValidator\isDomain;

class IsDomain implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!isDomain($value)) {
            $fail('domain-validator::validation.is_domain')->translate();
        }
    }
}
