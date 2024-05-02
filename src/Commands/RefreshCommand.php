<?php

namespace Myerscode\Laravel\DomainValidator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain-validator:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and cache data domain validation.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call(FetchCommand::class);
        $this->call(CacheCommand::class);
    }
}
