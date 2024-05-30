<?php

namespace App\Livewire\ProjectManagement\Forms;

use App\Livewire\BaseForm;
use App\Models\Agency;
use App\Models\PIC;
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
use Filament\Forms\Get;
use Filament\Forms\Set;
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
        $projectData = Section::make('Projek')
            ->description('Maklumat mengenai projek')
            ->schema([
                TextInput::make('year')->label('Tahun')->numeric()->required(),
                TextInput::make('name')->label('Nama Projek')->required(),
                Select::make('agency_id')->label('Agensi')->helperText('Agensi yang terlibat')
                    ->searchable()
                    ->required()
                    ->options(Agency::pluck('name', 'id'))
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        if ($get('agency_id') == false) {
                            $set('pic_id', null);
                        }
                    }),
                Select::make('pic_id')->label('PIC Agensi')->helperText('PIC agensi yang terlibat')
                    ->options(function (Get $get) {
                        $selectedAgencyId = $get('agency_id');
                        if ($selectedAgencyId) {
                            return PIC::where('agency_id', $selectedAgencyId)->pluck('name', 'id');
                        } else {
                            return null;
                        }
                    })
                    ->searchable()
                    ->multiple()
                    ->required(fn (Get $get) => $get('agency_id'))
                    ->hidden(fn (Get $get) => !$get('agency_id')),
                TextInput::make('contract_guarentee')->label('Tempoh Jaminan')->required()->helperText('Bulan')->numeric(),
                DatePicker::make('start_date_contract')->label('Tarikh Mula Kontrak')->required(),
                DatePicker::make('end_date_contract')->label('Tarikh Tamat Kontrak')->required(),
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
            ])
            ->collapsed($this->project->exists)
            ->collapsible();

        $projectData2 = $this->project->exists ? Section::make('Maklumat Perbatuan')
            ->description('Tambah perbatuan projek')
            ->schema([
                TextInput::make('mileage')->label('Perbatuan')->numeric(),
                DatePicker::make('date')->label('Tarikh'),
                TextInput::make('place')->label('Tempat'),
                TextInput::make('status_mileage')->label('Status'),
            ])
            ->collapsible() : null;

        return $form->schema(array_filter([
            $projectData,
            $projectData2,
        ]))->statePath('data')->inlineLabel();
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
