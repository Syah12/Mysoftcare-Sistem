<?php

namespace App\Livewire\Intern\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Intern;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InternTable extends BaseDataTable
{
    public function getQuery()
    {
        return Intern::query()->latest();
    }

    public function getColumns()
    {
        $name = TextColumn::make('name')->label('Name Penuh')->searchable()->sortable();
        $ic = TextColumn::make('ic')->label('IC')->searchable()->sortable();
        // $training_period = TextColumn::make('training_period')->label('Tempoh Latihan')->sortable();
        $start_intern = TextColumn::make('start_intern')->label('Tarikh Mula')->sortable();
        $end_intern = TextColumn::make('end_intern')->label('Tarikh Tamat')->sortable();
        $status = TextColumn::make('status')->label('Status')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Diterima' => 'success',
            'Ditolak' => 'danger',
            'Aktif' => 'info',
            'Tamat' => 'warning',
        });
        $officePosition = TextColumn::make('office_position')->label('Pejabat')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Bawah' => 'gray',
            'Atas' => 'gray',
        });

        return [
            $name,
            $ic,
            // $training_period,
            $start_intern,
            $end_intern,
            $status,
            $officePosition
        ];
    }

    public function getFormFields()
    {
        $form = Wizard::make([
            Step::make('info')
                ->label('Maklumat Pelajar Industri')
                ->schema([
                    Fieldset::make('Label')
                        ->schema([
                            TextInput::make('name')->label('Nama'),
                            TextInput::make('ic')->label('IC'),
                            TextInput::make('email')->label('Emel'),
                            TextInput::make('phone_number')->label('No. Telefon'),
                        ])
                        ->label(false)
                        ->columns(2),
                    FileUpload::make('letter')->label('Surat Tawaran')->helperText('Format PDF')->disk('public')->directory('file')->openable(),
                ]),
            Step::make('education')
                ->label('Maklumat Pelajaran')
                ->schema([
                    Fieldset::make('Label')
                        ->schema([
                            TextInput::make('year')->label('Tahun')->numeric(),
                            Select::make('educational_level')->label('Taraf Pendidikan')
                                ->options([
                                    'Diploma' => 'Diploma',
                                    'Degree' => 'Degree',
                                ])->native(false),
                            Radio::make('institutions')->label('Sekolah/Universiti')
                                ->options([
                                    'Sekolah' => 'Sekolah',
                                    'Universiti' => 'Universiti'
                                ]),
                            Select::make('university')->label('Nama Sekolah/Universiti')
                                ->options([
                                    'UiTM' => 'UiTM',
                                    'UniSZA' => 'UniSZA',
                                    'UMT' => 'UMT',
                                ]),
                            TagsInput::make('skills')->label('Kemahiran'),
                        ])
                        ->label(false)
                        ->columns(2),
                ]),
            Step::make('internship')
                ->label('Maklumat Permohonan')
                ->schema([
                    Fieldset::make('Label')
                        ->schema([
                            TextInput::make('training_period')->label('Tempoh Latihan'),
                            DatePicker::make('start_intern')->label('Tarikh Mula'),
                            DatePicker::make('end_intern')->label('Tarikh Akhir'),
                        ])
                        ->label(false)
                        ->columns(3),
                    FileUpload::make('image')->label('Gambar'),
                    FileUpload::make('resume')->label('Resume'),
                    Fieldset::make('Label')
                        ->schema([
                            Select::make('status')->label('Status')
                                ->options([
                                    'Diterima' => 'Diterima',
                                    'Ditolak' => 'Ditolak',
                                    'Aktif' => 'Aktif',
                                    'Tamat' => 'Tamat',
                                ]),
                            Select::make('office_position')->label('Posisi Pejabat')->helperText('Kedudukan pelajar industri dalam pejabat sama ada atas atau bawah')
                                ->options([
                                    'Atas' => 'Atas',
                                    'Bawah' => 'Bawah',
                                ])
                                ->native(false),
                        ])
                        ->label(false)
                        ->columns(2),
                ]),
        ]);

        return [
            $form,
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Pelajar Industri')
                    ->icon('heroicon-s-plus')
                    ->modalHeading('Maklumat Pelajar Industri')
                    ->modalDescription('Tambah Maklumat Pelajar Industri')
                    ->model(Intern::class)
                    ->slideOver()
                    ->modalWidth('w-full')
                    ->color('info')
                    ->createAnother(false)
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Pelajar Industri')
            ->emptyStateDescription('Senarai Pelajar Industri akan dipaparkan di sini')
            ->actions([
                ViewAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Pelajar Industri')
                    ->modalDescription('Lihat Maklumat Pelajar Industri')
                    ->button()
                    ->slideOver()
                    ->modalWidth('w-full')
                    ->color('gray')
                    ->label('Lihat')
                    ->modalCloseButton('Simpan')
                    ->form($this->getFormFields()),
                EditAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Pelajar Industri')
                    ->modalDescription('Kemaskini Maklumat Pelajar Industri')
                    ->button()
                    ->label('Kemaskini')
                    ->slideOver()
                    ->modalWidth('w-full')
                    ->color('info')
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ]);
    }
}
