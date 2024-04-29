<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MailwindRefreshCommand extends Command
{

    protected $signature = 'mailwind:refresh';

    protected $description = 'Command description';

    protected array $resources = [
        // 'resources/views/pdf/duties/duty-schedules',
    ];

    public function handle()
    {
        $resources = collect($this->resources);

        if ($resources->isEmpty()) {
            echo "No resources to process.";
            return;
        }

        $command = $resources->map(function ($resource) {
            $inputFile = "{$resource}.blade.php";
            $outputFile = "{$resource}-out.blade.php";
            echo "Processing: $outputFile\n\n";
            return "mailwind --input-html $inputFile --output-html $outputFile";
        })
            ->join(' && ');

        return shell_exec($command);
    }
}
