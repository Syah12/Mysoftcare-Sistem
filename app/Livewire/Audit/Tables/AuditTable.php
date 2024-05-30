<?php

namespace App\Livewire\Audit\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Audit;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Component;

class AuditTable extends BaseDataTable
{
    public function getQuery()
    {
        return Audit::query()->latest();
    }

    public function getColumns()
    {
        $userID = TextColumn::make('user.name')->label('Pengguna')->sortable()->searchable();
        $event = TextColumn::make('event')->label('Jenis Perubahan')->sortable()->searchable();
        $model = TextColumn::make('auditable_type')->label('Model')->sortable()->searchable();
        $ip = TextColumn::make('ip_address')->label('IP')->sortable()->searchable();

        return [
            $userID,
            $event,
            $model,
            $ip
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada audit')
            ->emptyStateDescription('Senarai audit akan dipaparkan di sini')
            ->heading('Jejak Audit')
            ->description('Senarai jejak audit bagi sistem mysoftcare')
            ->actions([
                ViewAction::make()
                    ->icon(false)
                    ->label('Lihat')
                    ->color('primary')
                    ->button()
                    ->modalHeading('Audit')
                    ->modalDescription('Maklumat audit')
                    ->slideOver()
                    ->modalWidth('4xl')
                    ->modalContent(function ($record) {
                        return view('admin.audit.details', [
                            'row'           => $record,
                        ]);
                    }),
            ]);
    }
}
