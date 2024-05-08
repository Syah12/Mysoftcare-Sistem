<?php

namespace App\Livewire\ProjectManagement\Forms;

use App\Livewire\BaseForm;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Livewire\Component;

class ProjectManagementForm extends BaseForm
{
    public ?Project $project = null;

    public function mount()
    {
        $this->project ??= new Project();
        $this->data = $this->project->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        $projectData = Wizard::make([
            Step::make('Projek')
                ->description('Maklumat mengenai projek')
                ->schema([
                    TextInput::make('year')->label('Tahun')->numeric()->required(),
                    TextInput::make('name')->label('Nama Projek')->required(),
                    Select::make('agency')->label('Agensi')->required(),
                    TextInput::make('pic_agency')->label('PIC Agensi')->required(),
                    TextInput::make('contract_period')->label('Tempoh Kontrak')->required()->helperText('Bulan')->numeric(),
                    TextInput::make('contract_guarentee')->label('Tempoh Jaminan')->required()->helperText('Bulan')->numeric(),
                    DatePicker::make('start_date_contract')->label('Tarikh Mula Kontrak')->required(),
                    DatePicker::make('end_date_contract')->label('Tarikh Tamat Kontrak')->required(),
                ]),
            Step::make('Kontrak')
                ->description('Maklumat mengenai kontrak projek')
                ->schema([
                    TextInput::make('contract_value')->label('Nilai Kontrak')->required()->prefix('RM')->numeric(),
                    Textarea::make('notes')->label('Catatan')->required()->rows(3),
                    FileUpload::make('sst')->label('SST')->helperText('Format PDF')->disk('public')->directory('file')->required()->openable(),
                    TextInput::make('creator')->label('Pencipta')->required(),
                    Select::make('status')
                        ->label('Status Projek')
                        ->options([
                            'Berjaya' => 'Berjaya',
                            'Aktif' => 'Aktif',
                            'EOT' => 'EOT',
                            'Tempoh jaminan' => 'Tempoh jaminan',
                            'Selesai' => 'Selesai',
                        ])
                        ->helperText('Status projek terkini')
                        ->native(false)
                        ->required()
                ]),
        ]);

        return $form->schema([
            $projectData,
        ])->statePath('data')->inlineLabel();
    }

    public function save()
    {
        $this->form->getState();
        $this->project->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('project.index');
    }
}
