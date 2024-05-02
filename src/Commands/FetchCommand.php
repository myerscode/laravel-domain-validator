<?php

namespace Myerscode\Laravel\DomainValidator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class FetchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain-validator:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data sets for domain validation.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Fetching latest data sets...');

        $this->fetchSuffixList();
        $this->fetchTldList();
    }

    protected function fetchAndStoreData(string $url, string $storedName): void
    {
        Storage::disk(config('domain-validator.storage_driver'))->put($storedName, file_get_contents($url));
    }

    protected function fetchSuffixList(): void
    {
        $this->fetchAndStoreData(config('domain-validator.public_suffix.list_url'), config('domain-validator.public_suffix.storage_name'));
    }

    protected function fetchTldList(): void
    {
        $this->fetchAndStoreData(config('domain-validator.iana_tld.list_url'), config('domain-validator.iana_tld.storage_name'));
    }

}
