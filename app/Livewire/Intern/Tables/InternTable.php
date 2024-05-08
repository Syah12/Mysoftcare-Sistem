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
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class InternTable extends BaseDataTable
{
    public function getQuery()
    {
        return Intern::query()->latest();
    }

    public function getColumns()
    {
        $img = ImageColumn::make('image')->label('Gambar Profil')->circular()->width(60)->height(60);
        $name = TextColumn::make('name')->label('Name Penuh')->searchable()->sortable();
        $ic = TextColumn::make('ic')->label('IC')->searchable()->sortable();
        $start_intern = TextColumn::make('start_intern')->label('Tarikh Mula')->sortable();
        $end_intern = TextColumn::make('end_intern')->label('Tarikh Tamat')->sortable();
        $status = TextColumn::make('status')->label('Status')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Diterima' => 'success',
            'Ditolak' => 'danger',
            'Aktif' => 'info',
            'Tamat' => 'warning',
        });

        return [
            $img,
            $name,
            $ic,
            $start_intern,
            $end_intern,
            $status,
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Pelajar Industri')
                    ->icon('heroicon-s-plus')
                    ->url(fn (): string => route('intern.create'))
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Pelajar Industri')
            ->emptyStateDescription('Senarai Pelajar Industri akan dipaparkan di sini')
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Lihat')
                        ->icon(false)
                        ->color('info')
                        ->url(fn (Intern $record): string => route('intern.show', $record)),
                    EditAction::make()
                        ->label('Kemaskini')
                        ->icon(false)
                        ->color('warning')
                        ->url(fn (Intern $record): string => route('intern.edit', $record)),
                    DeleteAction::make('delete')
                        ->label('Padam')
                        ->icon(false)
                        ->requiresConfirmation()
                        ->action(fn (Intern $record) => $record->delete())
                        ->modalHeading('Padam Pelajar Industri')
                        ->modalDescription('Adakah anda pasti ingin melakukan ini?')
                        ->modalCancelActionLabel('Tidak')
                        ->modalSubmitActionLabel('Ya')
                ])->color('gray'),
            ])
            ->heading('Senarai Pelajar LI')
            ->description('Kemaskini maklumat pelajar LI di sini')
            ->filters([
                SelectFilter::make('status')->label('Status')
                    ->options([
                        'Diterima' => 'Diterima',
                        'Ditolak' => 'Ditolak',
                        'Aktif' => 'Aktif',
                        'Tamat' => 'Tamat'
                    ])
                    ->native(false)
            ]);
    }
}
