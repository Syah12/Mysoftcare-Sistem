<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateNewAttendanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new attendance every new day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $employee->attendances()->create(['date' => Carbon::now(), 'is_present' => false, 'excuse']);
        }
    }
}
