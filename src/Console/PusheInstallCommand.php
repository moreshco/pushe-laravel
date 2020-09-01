<?php

namespace Moreshco\PusheLaravel\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class PusheInstallCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pushe:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Pushe Laravel Package';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info("Publish config ...");
        Artisan::call('vendor:publish', [
            '--provider' => 'Moreshco\PusheLaravel\PusheLaravelServiceProvider', '--tag' => 'config'
        ]);

        $this->info("Set Routes ...");
        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/stubs/make/routes.stub'),
            FILE_APPEND
        );

        $this->info("Publish migrations ...");
        Artisan::call('vendor:publish', [
            '--provider' => 'Moreshco\PusheLaravel\PusheLaravelServiceProvider', '--tag' => 'migrations'
        ]);

        $this->info("Migrate ...");
        Artisan::call('migrate');

        $this->info('Pushe Laravel scaffolding generated successfully.');
    }
}
