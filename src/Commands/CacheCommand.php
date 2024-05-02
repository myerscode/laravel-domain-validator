<?php

namespace Myerscode\Laravel\DomainValidator\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class CacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain-validator:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache the raw data sets.';

    public function handle(): void
    {
        $this->info('Caching data sets...');

        $contents = Storage::disk(config('domain-validator.storage_driver'))->get(config('domain-validator.public_suffix.storage_name'));
        Cache::store(config('domain-validator.cache_driver'))->add(config('domain-validator.public_suffix.cache_name'), $contents);

        $contents = Storage::disk(config('domain-validator.storage_driver'))->get(config('domain-validator.iana_tld.storage_name'));
        Cache::store(config('domain-validator.cache_driver'))->add(config('domain-validator.iana_tld.cache_name'), $contents);
    }
}
