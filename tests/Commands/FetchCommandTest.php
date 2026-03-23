<?php

declare(strict_types=1);

namespace Tests\Commands;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

final class FetchCommandTest extends TestCase
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

    public function testCommandOutputsErrorWhenFetchFails(): void
    {
        config()->set('domain-validator.public_suffix.list_url', __DIR__ . '/nonexistent-file.dat');
        config()->set('domain-validator.iana_tld.list_url', __DIR__ . '/nonexistent-file.txt');

        Storage::fake(config('domain-validator.storage_driver'));

        $this
            ->artisan('domain-validator:fetch', [])
            ->expectsOutput('Fetching latest data sets...')
            ->expectsOutputToContain('Failed to fetch data from')
            ->assertExitCode(0);
    }
}
