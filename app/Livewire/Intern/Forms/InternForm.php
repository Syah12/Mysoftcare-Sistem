<?php

namespace App\Livewire\Intern\Forms;

use App\Livewire\BaseForm;
use App\Models\Intern;
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
            Step::make('Maklumat Pelajar Industri')
                ->schema([
                    Split::make([
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
                    ])->from('md'),
                    Split::make([
                        TextInput::make('phone_number')->label('No. Telefon')->required(),
                        TextInput::make('email')->label('E-mel')->required(),
                    ])->from('md'),
                    Split::make([
                        TagsInput::make('skills')->label('Kemahiran')->placeholder('')->helperText('Cth: Laravel')->required(),
                        TextInput::make('university')->label('Universiti')->helperText('Universiti Terkini')->required(),
                    ])->from('md'),
                    Repeater::make('educational_level')
                        ->label('Taraf Pendidikan')
                        ->schema([
                            TextInput::make('year')->label('Tahun')->required(),
                            TextInput::make('educational_level')->label('Taraf pendidikan')->required(),
                            TextInput::make('institution')->label('Sekolah/Universiti')->required(),
                        ])
                        ->columns(3)
                        ->defaultItems(1),
                ]),
            Step::make('Maklumat Permohonan Latihan Industri')
                ->schema([
                    FileUpload::make('letter')->label('Surat Permohonan')->helperText('Format PDF')->disk('public')->directory('file')->required()->openable(),
                    Split::make([
                        DatePicker::make('start_intern')->label('Tarikh Mula')->required(),
                        DatePicker::make('end_intern')->label('Tarikh Tamat')->required(),
                        TextInput::make('training_period')->label('Tempoh Latihan')->required(),
                    ])->from('md'),
                    FileUpload::make('image')->label('Gambar Profil')->helperText('Format PNG')->disk('public')->directory('file')->required(),
                    FileUpload::make('resume')->label('Resume')->helperText('Format PDF')->disk('public')->directory('file')->required()->openable(),
                    Split::make([
                        Radio::make('status')
                            ->label('Status Pelajar LI')
                            ->options([
                                'Diterima' => 'Diterima',
                                'Ditolak' => 'Ditolak',
                                'Aktif' => 'Aktif',
                                'Tamat' => 'Tamat',
                            ])
                            ->inline()
                            ->inlineLabel(false)
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
                    ])->from('md'),
                ]),
        ]);

        return $form->schema([
            $internData,
        ])->statePath('data');
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
