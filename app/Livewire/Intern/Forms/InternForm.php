<?php

namespace App\Livewire\Intern\Forms;

use App\Livewire\BaseForm;
use App\Models\Intern;
use App\Models\University;
use App\Traits\Interns\InternFormTrait;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class InternForm extends BaseForm
{
    use InternFormTrait;

    public ?Intern $intern = null;

    public function mount()
    {
        $this->intern ??= new Intern();
        $this->data = $this->intern->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Wizard::make([
                Step::make('Pelajar Industri')
                    ->description('Maklumat mengenai Pelajar LI')
                    ->schema($this->internFormSchema()),
                Step::make('Permohonan')
                    ->description('Maklumat mengenai Permohonan Latihan Industri')
                    ->schema($this->applicationFormSchema()),
            ])
        ])
            ->statePath('data')->inlineLabel();
    }

    public function save()
    {
        $this->form->getState();
        $this->intern->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('intern.index');
    }
}
