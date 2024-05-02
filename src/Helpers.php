<?php

namespace Myerscode\Laravel\DomainValidator;

use Myerscode\Laravel\DomainValidator\Facades\Rules;
use Myerscode\Laravel\DomainValidator\Facades\Suffix;
use Myerscode\Laravel\DomainValidator\Facades\TopLevelDomain;
use Pdp\Domain;
use Throwable;

/**
 * Clean a string that will be used in domain checks
 */
function sanitizeDomainString(string $domain): string
{
    $pattern = '/^\s*(https?:\/\/)?(.*?)(\/+)?\s*$/i';

    return preg_replace($pattern, '$2', $domain);
}

/**
 * Is a given string a valid domain
 *
 * @param  string  $domain
 *
 * @return bool
 */
function isDomain(string $domain): bool
{
    try {
        Rules::getICANNDomain(sanitizeDomainString($domain));

        return true;
    } catch (Throwable) {
        return false;
    }
}

/**
 * Is the given value a valid known TLD
 *
 * @param  string  $input
 *
 * @return bool
 */
function isTLD(string $input): bool
{
    try {
        $tld = Suffix::fromUnknown(trim($input, '.'));

        foreach (TopLevelDomain::getIterator() as $knownTld) {
            if ($knownTld === $tld->toAscii()->toString()) {
                return true;
            }
        }

        return false;
    } catch (Throwable) {
        return false;
    }
}

/**
 * Does the domain have an ICANN suffix.
 */
function hasICANNSuffix(string $domain): bool
{
    try {
        return Rules::resolve($domain)->suffix()->isICANN();
    } catch (Throwable) {
        return false;
    }
}

/**
 * Determine if the domain have a private suffix.
 */
function hasPrivateSuffix(string $domain): bool
{
    try {
        return Rules::resolve($domain)->suffix()->isPrivate();
    } catch (Throwable) {
        return false;
    }
}

function hasKnownSuffix(string $domain): bool
{
    try {
        return Rules::resolve($domain)->suffix()->isKnown();
    } catch (Throwable) {
        return false;
    }
}

