<?php

namespace Myerscode\Laravel\DomainValidator;

use Closure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Translation\Translator;
use Illuminate\Validation\InvokableValidationRule;
use Myerscode\Laravel\DomainValidator\Commands\CacheCommand;
use Myerscode\Laravel\DomainValidator\Commands\FetchCommand;
use Myerscode\Laravel\DomainValidator\Commands\RefreshCommand;
use Myerscode\Laravel\DomainValidator\Commands\TestDomainCommand;
use Myerscode\Laravel\DomainValidator\Rules\IsDomain;
use Pdp\Suffix;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerConfig();

        $this->registerLanguage();

        $this->app->singleton('ldv.factory', function () {
            return new RulesFactory;
        });

        $this->app->singleton('ldv.rules', function ($app) {
            return $app->make('ldv.factory')->createPublicSuffixRules();
        });

        $this->app->singleton('ldv.tld', function ($app) {
            return $app->make('ldv.factory')->createTopLevelDomains();
        });

        $this->app->singleton('ldv.suffix', function ($app) {
            return new class {
                public function __call($method, $parameters)
                {
                    return Suffix::$method(...$parameters);
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
            $this->registerCommands();
        }

        $this->registerValidators();
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
            'domain-validator'
        );
    }

    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/domain-validator.php' => config_path('domain-validator.php'),
            ],
                'config'
            );
        }
    }

    protected function registerLanguage(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'domain-validator');
    }

    protected function registerValidators(): void
    {
        Validator::extend(
            'is_domain',
            InvokableValidationRule::make(new IsDomain),
            'The :attribute field is not a valid domain name.'
        );
    }

}
