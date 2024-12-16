<?php

namespace App\Console\Commands\MakeFilter;

use Illuminate\Console\Command;

class MakeFilterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Filter class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->callSilent('create:filter', ['name' => $this->argument('name')]);

        $this->info('Create Filter success');
    }
}
