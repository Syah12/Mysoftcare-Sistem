<?php

namespace App\Livewire\Duty\Partials;

use App\Models\Duty;
use App\Models\Employee;
use Carbon\Carbon;
use Livewire\Component;

class GenerateDuty extends Component
{
    public array $dutyRosters;
    public int $employeeIndex = 0;
    public string $generateButtonPressed;
    public ?string $fromDate = null;
    public ?string $toDate = null;

    public function generate()
    {
        $duties = Duty::all();
        $employee = Employee::pluck('id')->toArray();

        $this->dutyRosters = [];
        $this->employeeIndex = rand(0, count($employee) - 1);

        $startDate = $this->fromDate ? Carbon::parse($this->fromDate) : Carbon::now()->startOfMonth();
        $endDate = $this->toDate ? Carbon::parse($this->toDate) : Carbon::now()->endOfMonth();

        while ($startDate->lessThanOrEqualTo($endDate)) {
            if ($startDate->isSunday()) {
                $weekStart = $startDate->copy();
                $weekEnd = $weekStart->copy()->addDays(4); // Thursday

                // Check if the end of the week is within the range
                if ($weekEnd->lessThanOrEqualTo($endDate)) {
                    $dateRange = $weekStart->format('j M') . ' - ' . $weekEnd->format('j M');
                    $existingWeek = collect($this->dutyRosters)->firstWhere('date_range', $dateRange);

                    if (!$existingWeek) {
                        $assignments = $this->generateDutyAssignments($duties, $employee);

                        $this->dutyRosters[] = [
                            'date_range' => $dateRange,
                            'duties' => $assignments,
                        ];
                    }
                }
            }

            $startDate->addDay(); // Move to the next day
        }

        $this->generateButtonPressed = time();
    }

    private function generateDutyAssignments($duties, $employee)
    {
        $assignments = [];

        foreach ($duties as $duty) {
            $assignments[$duty->id] = $employee[$this->employeeIndex];

            $this->employeeIndex++;

            if ($this->employeeIndex == count($employee)) {
                $this->employeeIndex = 0;
            }
        }

        return $assignments;
    }

    public function render()
    {
        return view('livewire.duty.partials.generate-duty');
    }
}
