<?php

namespace App\Livewire\User\Tables;

use App\Livewire\BaseDataTable;
use App\Models\User;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Component;

class UserTable extends BaseDataTable
{
    public function getQuery()
    {
        return User::query()->latest();
    }

    public function getColumns()
    {
        $name = TextColumn::make('name')->label('Nama')->sortable()->searchable();
        $email = TextColumn::make('email')->label('E-mel')->sortable()->searchable();

        return [
            $name,
            $email
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Pengguna')
                    ->icon('heroicon-s-plus')
                    ->url(fn (): string => route('user.create'))
            ])
            ->columns($this->getColumns());
    }
}
