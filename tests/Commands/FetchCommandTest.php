<?php

namespace Tests\Commands;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FetchCommandTest extends TestCase
{
    public function testCommand(): void
    {
        Storage::fake(config('domain-validator.storage_driver'));

        $this
            ->artisan('domain-validator:fetch', [])
            ->expectsOutput('Fetching latest data sets...')
            ->assertExitCode(0);

        Storage::disk(config('domain-validator.storage_driver'))
            ->assertExists(config('domain-validator.public_suffix.storage_name'));

        Storage::disk(config('domain-validator.storage_driver'))
            ->assertExists(config('domain-validator.iana_tld.storage_name'));
    }
}
