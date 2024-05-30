<?php

namespace App\Livewire\Audit\Partials;

use App\Models\Audit;
use Livewire\Component;

class ShowData extends Component
{
    public ?Audit $audit = null;

    public function next()
    {
        $this->audit = Audit::where('id', '>', $this->audit->id)->oldest()->first();
    }

    public function prev()
    {
        $this->audit = Audit::where('id', '<', $this->audit->id)->latest()->first();

    }

    public function render()
    {
        $data = $this->audit?->event == 'updated' ? collect($this->audit?->old_values)->keys() : collect($this->audit?->new_values)->keys();

        return view('livewire.audit.partials.show-data', [
            'data' => $data,
            'showPrev'    => Audit::where('id', '<', $this->audit->id)->latest()->first() != null,
            'showNext'    => Audit::where('id', '>', $this->audit->id)->oldest()->first() != null,
        ]);
    }
}
