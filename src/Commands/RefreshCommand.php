<?php

namespace Myerscode\Laravel\DomainValidator\Commands;

use Illuminate\Console\Command;
use Override;

class RefreshCommand extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    #[Override]
    protected $description = 'Fetch and cache data domain validation.';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    #[Override]
    protected $signature = 'domain-validator:refresh';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->call(FetchCommand::class);
        $this->call(CacheCommand::class);
    }
}
