<?php

declare(strict_types=1);

namespace Tests\Commands;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

final class RefreshCommandTest extends TestCase
{
    public function test_command(): void
    {
        Storage::fake(config('domain-validator.storage_driver'));

        $this
            ->artisan('domain-validator:refresh', [])
            ->expectsOutput('Fetching latest data sets...')
            ->expectsOutput('Caching data sets...')
            ->assertExitCode(0);
    }
}
