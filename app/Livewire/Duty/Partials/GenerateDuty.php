<?php

namespace App\Livewire\Duty\Partials;

use App\Models\Duty;
use App\Models\Employee;
use Carbon\Carbon;
use Livewire\Component;

class GenerateDuty extends Component
{
    public array $dutyRostersTopOffice = [];
    public array $dutyRostersBottomOffice = [];
    public int $employeeIndexTopOffice = 0;
    public int $employeeIndexBottomOffice = 0;
    public string $generateButtonPressed;
    public ?string $fromDate = null;
    public ?string $toDate = null;

    public function print()
    {
        $query = [
            'dutyRostersTopOffice'   => $this->dutyRostersTopOffice,
            'dutyRostersBottomOffice'   => $this->dutyRostersBottomOffice,
        ];

        $this->dispatch('print', route('duty.print', $query));
    }

    public function generate()
    {
        $this->dutyRostersTopOffice = [];
        $this->dutyRostersBottomOffice = [];

        $dutiesTopOffice = Duty::where('office_position', 'Atas')->get();
        $dutiesBottomOffice = Duty::where('office_position', 'Bawah')->get();

        $employeeTopOffice = Employee::where('office_position', 'Atas')->pluck('id')->toArray();
        $employeeBottomOffice = Employee::where('office_position', 'Bawah')->pluck('id')->toArray();

        $this->employeeIndexTopOffice = rand(0, count($employeeTopOffice) - 1);
        $this->employeeIndexBottomOffice = rand(0, count($employeeBottomOffice) - 1);

        $startDate = $this->fromDate ? Carbon::parse($this->fromDate) : Carbon::now()->startOfMonth();
        $endDate = $this->toDate ? Carbon::parse($this->toDate) : Carbon::now()->endOfMonth();

        while ($startDate->lessThanOrEqualTo($endDate)) {
            if ($startDate->isSunday()) {
                $weekStart = $startDate->copy();
                $weekEnd = $weekStart->copy()->addDays(4); // Thursday

                // Check if the end of the week is within the range
                if ($weekEnd->lessThanOrEqualTo($endDate)) {
                    $dateRange = $weekStart->format('j M') . ' - ' . $weekEnd->format('j M');

                    $existingWeekTopOffice = collect($this->dutyRostersTopOffice)->firstWhere('date_range', $dateRange);
                    $existingWeekBottomOffice = collect($this->dutyRostersBottomOffice)->firstWhere('date_range', $dateRange);

                    if (!$existingWeekTopOffice) {
                        $assignmentsTopOffice = $this->generateDutyAssignments($dutiesTopOffice, $employeeTopOffice, $this->employeeIndexTopOffice);
                        $this->dutyRostersTopOffice[] = [
                            'date_range' => $dateRange,
                            'duties' => $assignmentsTopOffice,
                        ];
                    }

                    if (!$existingWeekBottomOffice) {
                        $assignmentsBottomOffice = $this->generateDutyAssignments($dutiesBottomOffice, $employeeBottomOffice, $this->employeeIndexBottomOffice);
                        $this->dutyRostersBottomOffice[] = [
                            'date_range' => $dateRange,
                            'duties' => $assignmentsBottomOffice,
                        ];
                    }
                }
            }

            $startDate->addDay(); // Move to the next day
        }

        $this->generateButtonPressed = now()->timestamp;
    }

    private function generateDutyAssignments($duties, $employee, &$employeeIndex)
    {
        $assignments = [];

        foreach ($duties as $duty) {
            $assignments[$duty->id] = $employee[$employeeIndex];

            $employeeIndex++;

            if ($employeeIndex == count($employee)) {
                $employeeIndex = 0;
            }
        }

        return $assignments;
    }

    public function render()
    {
        return view('livewire.duty.partials.generate-duty');
    }
}
