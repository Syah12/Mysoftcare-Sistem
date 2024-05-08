<?php

namespace App\Livewire\Intern\Forms;

use App\Livewire\BaseForm;
use App\Models\Intern;
use App\Models\University;
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
    public ?Intern $intern = null;

    public function mount()
    {
        $this->intern ??= new Intern();
        $this->data = $this->intern->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        $internData = Wizard::make([
            Step::make('Pelajar Industri')
                ->description('Maklumat mengenai Pelajar LI')
                ->schema([
                    TextInput::make('name')->label('Nama Penuh')->required(),
                    Select::make('gender')
                        ->label('Jantina')
                        ->options([
                            'Lelaki' => 'Lelaki',
                            'Perempuan' => 'Perempuan',
                        ])
                        ->native(false)
                        ->required(),
                    TextInput::make('ic')->label('IC')->required(),
                    TextInput::make('phone_number')->label('No. Telefon')->required(),
                    TextInput::make('email')->label('E-mel')->required(),
                    TagsInput::make('skills')->label('Kemahiran')->placeholder('')->helperText('Cth: Laravel')->required(),
                    Select::make('university_id')->label('Universiti')->helperText('Universiti Terkini')
                        ->options(University::where('is_university', true)->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    Repeater::make('educational_level')
                        ->label('Taraf Pendidikan')
                        ->schema([
                            TextInput::make('year')->label('Tahun')->required(),
                            TextInput::make('educational_level')->label('Taraf pendidikan')->required(),
                            Select::make('institution')->label('Universiti')->helperText('Universiti Terkini')
                                ->options(University::pluck('name', 'id'))
                                ->searchable()
                                ->required(),
                        ])
                        ->columns(3)
                        ->defaultItems(1),
                ]),
            Step::make('Permohonan')
                ->description('Maklumat mengenai Permohonan Latihan Industri')
                ->schema([
                    FileUpload::make('letter')->label('Surat Permohonan')->helperText('Format PDF')->disk('public')->directory('file')->required()->openable(),
                    DatePicker::make('start_intern')->label('Tarikh Mula')->required(),
                    DatePicker::make('end_intern')->label('Tarikh Tamat')->required(),
                    TextInput::make('training_period')->label('Tempoh Latihan')->required(),
                    FileUpload::make('image')->label('Gambar Profil')->helperText('Format PNG')->disk('public')->directory('file'),
                    FileUpload::make('resume')->label('Resume')->helperText('Format PDF')->disk('public')->directory('file')->required()->openable(),
                    Radio::make('status')
                        ->label('Status Pelajar LI')
                        ->options([
                            'Diterima' => 'Diterima',
                            'Ditolak' => 'Ditolak',
                            'Aktif' => 'Aktif',
                            'Tamat' => 'Tamat',
                        ])
                        ->inline()
                        ->required(),
                    Select::make('office_position')
                        ->label('Posisi Pejabat')
                        ->options([
                            'Atas' => 'Atas',
                            'Bawah' => 'Bawah',
                        ])
                        ->helperText('Kedudukan pelajar tersebut dalam pejabat')
                        ->native(false)
                        ->required()
                ]),
        ]);

        return $form->schema([
            $internData,
        ])->statePath('data')->inlineLabel();
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
