<?php

namespace App\Livewire\ProjectManagement\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Component;

class ProjectManagementTable extends BaseDataTable
{
    public function getQuery()
    {
        return Project::query()->latest();
    }

    public function getColumns()
    {
        $year = TextColumn::make('year')->label('Tahun')->sortable();
        $name = TextColumn::make('name')->label('Nama Projek')->sortable()->searchable();
        $contractValue = TextColumn::make('contract_value')->label('Nilai Kontrak')->sortable();
        $status = TextColumn::make('status')->label('Status')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Berjaya' => 'success',
            'Aktif' => 'primary',
            'EOT' => 'danger',
            'Tempoh jaminan' => 'warning',
            'Selesai' => 'gray',
        });

        return [
            $year,
            $name,
            $contractValue,
            $status
        ];
    }

    public function getFormFields()
    {
        $year = TextInput::make('year')->label('Tahun')->numeric()->required();
        $name = TextInput::make('name')->label('Nama Projek')->required();
        $birthDate = DatePicker::make('birth_date')->label('Tarikh Lahir')->required();
        $phoneNumber = TextInput::make('phone_number')->label('No. Telefon')->required();
        $officePosition = Select::make('office_position')->label('Posisi Pejabat')->helperText('Kedudukan staf dalam pejabat sama ada atas atau bawah')
            ->options([
                'Atas' => 'Atas',
                'Bawah' => 'Bawah',
            ])
            ->native(false);
        // $colour = ColorPicker::make('colour');

        return [
            $year,
            $name,
            $birthDate,
            $phoneNumber,
            $officePosition,
            // $colour
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Projek')
                    ->icon('heroicon-s-plus')
                    ->modalHeading('Maklumat Projek')
                    ->modalDescription('Tambah Maklumat Projek')
                    ->model(Project::class)
                    ->slideOver()
                    ->modalWidth('w-full')
                    ->color('info')
                    ->createAnother(false)
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Projek')
            ->emptyStateDescription('Senarai projek akan dipaparkan di sini');
            // ->actions([
            //     ViewAction::make()
            //         ->icon(false)
            //         ->modalHeading('Maklumat Pekerja')
            //         ->modalDescription('Lihat Maklumat Pekerja')
            //         ->button()
            //         // ->slideOver()
            //         // ->modalWidth('xl')
            //         ->color('gray')
            //         ->label('Lihat')
            //         ->modalCloseButton('Simpan')
            //         ->form($this->getFormFields()),
            //     EditAction::make()
            //         ->icon(false)
            //         ->modalHeading('Maklumat Pekerja')
            //         ->modalDescription('Kemaskini Maklumat Pekerja')
            //         ->button()
            //         ->label('Kemaskini')
            //         // ->slideOver()
            //         // ->modalWidth('xl')
            //         ->color('info')
            //         ->modalSubmitActionLabel('Simpan')
            //         ->modalCancelActionLabel('Batalkan')
            //         ->form($this->getFormFields())
            // ]);
    }
}
