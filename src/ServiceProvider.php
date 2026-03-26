<?php

namespace Myerscode\Laravel\DomainValidator;

use Override;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Myerscode\Laravel\DomainValidator\Commands\CacheCommand;
use Myerscode\Laravel\DomainValidator\Commands\FetchCommand;
use Myerscode\Laravel\DomainValidator\Commands\RefreshCommand;
use Pdp\Suffix;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
            $this->registerCommands();
        }

        $this->registerValidators();
    }

    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        $this->registerConfig();

        $this->registerLanguage();

        $this->app->singleton('ldv.factory', fn (): RulesFactory => new RulesFactory());

        $this->app->singleton('ldv.rules', fn ($app) => $app->make('ldv.factory')->createPublicSuffixRules());

        $this->app->singleton('ldv.tld', fn ($app) => $app->make('ldv.factory')->createTopLevelDomains());

        $this->app->singleton('ldv.suffix', fn ($app): object => new class () {
            /** @param  array<int, mixed>  $parameters */
            public function __call(string $method, array $parameters): mixed
            {
                return Suffix::$method(...$parameters);
            }
        });
    }

    protected function registerCommands(): void
    {
        $this->commands([
            CacheCommand::class,
            FetchCommand::class,
            RefreshCommand::class,
        ]);
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/domain-validator.php',
            'domain-validator',
        );
    }

    protected function registerLanguage(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'domain-validator');
    }

    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                __DIR__ . '/config/domain-validator.php' => config_path('domain-validator.php'),
            ],
                'config',
            );
        }
    }

    protected function registerValidators(): void
    {
        Validator::extend(
            'is_domain',
            fn (string $attribute, mixed $value): bool => isDomain((string) $value),
            'The :attribute field is not a valid domain name.',
        );
    }

}
