<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('project.index') }}" name="Senarai Projek" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Semak Maklumat Projek" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        <div class="bg-white p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-6 gap-6 items-center">
                <div class="col-span-4">
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            Year :
                        </div>
                        <div class="font-medium">
                            {{ $project->year }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            Nama :
                        </div>
                        <div class="font-medium">
                            {{ $project->name }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            Status :
                        </div>
                        <div class="font-medium">
                            {{ $project->status }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            Nilai :
                        </div>
                        <div class="font-medium">
                            {{ $project->contract_value }}
                        </div>
                    </div>
                    <div>
                        <div>
                            SST :
                        </div>
                        @if (is_array($project->sst))
                            @foreach ($project->sst as $url => $filePath)
                                {{-- <iframe src="{{ asset('storage/' . $filePath) }}"></iframe> --}}
                                <a href="{{ asset('storage/' . $filePath) }}" target="blank">Klik SST</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
