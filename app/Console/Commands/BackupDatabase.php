<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database to SQL file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = 'backup-' . date('Y-m-d-H-i-s') . '.sql';
        $path = storage_path('backups/' . $filename);

        if (!is_dir(storage_path('backups'))) {
            mkdir(storage_path('backups'), 0755, true);
        }

        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . " > " . $path;

        exec($command);

        $this->info('Database backup created: ' . $path);
    }
}
