<?php

namespace App\Livewire\Intern\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Intern;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Tabs;
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

        return [
            $name,
            $ic,
            // $training_period,
            $start_intern,
            $end_intern,
            $status
        ];
    }

    public function getFormFields()
    {
        $form = Wizard::make([
            Step::make('info')
                ->label('Maklumat Pelajar Industri')
                ->schema([
                    TextInput::make('name')->label('Nama Penuh'),
                    TextInput::make('ic')->label('IC'),
                    TextInput::make('ic')->label('Emel'),
                ]),
            Step::make('ind')
                ->label('Maklumat Taraf Pendidikan')
                ->schema([
                    // ...
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
                    // ->slideOver()
                    // ->modalWidth('w-full')
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
                    // ->slideOver()
                    // ->modalWidth('w-full')
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
                    // ->slideOver()
                    // ->modalWidth('w-full')
                    ->color('info')
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ]);
    }
}
