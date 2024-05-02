<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Facades\Validator;
use Myerscode\Laravel\DomainValidator\Facades\Rules;
use Myerscode\Laravel\DomainValidator\ServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('cache:clear');
        Artisan::call('domain-validator:cache');
    }

    protected function defineEnvironment($app): void
    {
        // Setup default database to use sqlite :memory:
        tap($app['config'], function (Repository $config) {
            $config->set('domain-validator.storage_driver', 'local');
            $config->set('domain-validator.cache_driver', 'array');
            $config->set('filesystems.disks.local.root', __DIR__ . '/storage');
        });
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<string, class-string>
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Rules' => Rules::class,
        ];
    }

    public function getValidationMessage($message, $attribute): string
    {
        return Validator::make([], [])->makeReplacements(__($message), $attribute, '', []);
    }
}
