<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('employee.index') }}" name="Senarai Staf" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Semak Maklumat Staf" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        <div class="bg-white p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-6 gap-6 items-center">
                <div class="col-span-2 flex justify-center">
                    @if (is_array($employee->image))
                        @foreach ($employee->image as $uuid => $filePath)
                            <img src="{{ asset('storage/' . $filePath) }}" class="w-60 rounded-xl mb-4  "
                                alt="">
                        @endforeach
                    @endif
                </div>
                <div class="col-span-4">
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            Nama :
                        </div>
                        <div class="font-medium">
                            {{ $employee->name }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            E-mel :
                        </div>
                        <div class="font-medium">
                            {{ $employee->email }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            No. Telefon :
                        </div>
                        <div class="font-medium">
                            {{ $employee->phone_number }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            Jantina :
                        </div>
                        <div class="font-medium">
                            {{ $employee->gender }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
