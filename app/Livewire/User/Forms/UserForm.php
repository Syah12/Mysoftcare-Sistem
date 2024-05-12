<?php

namespace App\Livewire\User\Forms;

use App\Livewire\BaseForm;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class UserForm extends BaseForm
{
    public ?User $user = null;

    public function mount()
    {
        $this->user ??= new User();
        $this->data = $this->user->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        $userData = Section::make('Pengguna')
            ->description('Maklumat mengenai pengguna')
            ->schema([
                TextInput::make('name')->label('Nama Penuh')->required(),
                TextInput::make('email')->label('E-mel')->required(),
                TextInput::make('password')->label('Kata Laluan')->required(),
            ]);

        return $form->schema([
            $userData,
        ])->statePath('data')->inlineLabel();
    }

    public function save()
    {
        $this->form->getState();
        $this->user->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('user.index');
    }
}
