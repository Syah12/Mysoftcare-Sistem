<?php

namespace App\Livewire\ProjectManagement\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Project;
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

    // public function getFormFields()
    // {
    //     $fullName = TextInput::make('full_name')->label('Nama Penuh')->required();
    //     $birthDate = DatePicker::make('birth_date')->label('Tarikh Lahir')->required();
    //     $phoneNumber = TextInput::make('phone_number')->label('No. Telefon')->required();
    //     $officePosition = Select::make('office_position')->label('Posisi Pejabat')->helperText('Kedudukan staf dalam pejabat sama ada atas atau bawah')
    //         ->options([
    //             'Atas' => 'Atas',
    //             'Bawah' => 'Bawah',
    //         ])
    //         ->native(false);
    //     // $colour = ColorPicker::make('colour');

    //     return [
    //         $fullName,
    //         $birthDate,
    //         $phoneNumber,
    //         $officePosition,
    //         // $colour
    //     ];

    //     Notification::make()
    //         ->title('Berjaya')
    //         ->body('Maklumat berjaya disimpan')
    //         ->success()
    //         ->color('success')
    //         ->seconds(3)
    //         ->send();
    // }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            // ->headerActions([
            //     CreateAction::make()
            //         ->label('Tambah Staf')
            //         ->icon('heroicon-s-plus')
            //         ->modalHeading('Maklumat Pekerja')
            //         ->modalDescription('Tambah Maklumat Pekerja')
            //         ->model(Employee::class)
            //         // ->slideOver()
            //         // ->modalWidth('xl')
            //         ->color('info')
            //         ->createAnother(false)
            //         ->modalSubmitActionLabel('Simpan')
            //         ->modalCancelActionLabel('Batalkan')
            //         ->form($this->getFormFields())
            // ])
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
