@extends('pdf.layouts.base')

@section('title', $title)

@section('content')
    <div class="w-full" style="width: 100%;">
        <div class="space-y-4">
            <img src="{{ public_path('img/mysoftcare.png') }}" alt="Mysoftcare Logo">
            <div class="overflow-x-auto" style="overflow-x: auto; --tw-space-y-reverse: 0; margin-top: calc(16px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(16px * var(--tw-space-y-reverse));">
                <h2 class="text-lg font-bold" style="font-size: 18px; font-weight: 700;">Jadual Bertugas</h2>
                <p class="mb-2" style="margin-bottom: 8px;">Pejabat Atas</p>
                <table class="table-auto divide-y divide-gray-200" style="table-layout: auto; width: 100%;">
                    <!-- Table Header -->
                    <thead class="bg-gray-50" style="background-color: #f9fafb;">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding-left: 24px; padding-right: 24px; padding-top: 12px; padding-bottom: 12px; text-align: left; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em; color: #6b7280;">
                            </th>
                            @foreach ($dutyRostersTopOffice[0]['duties'] as $dutyId => $employeeName)
                                @php
                                    $dutyName = App\Models\Duty::find($dutyId)->name;
                                @endphp
                                <th class="px-6 py-3 text-left text-sm font-bold text-black bg-gray-200 uppercase tracking-wider" style="background-color: #e5e7eb; padding-left: 24px; padding-right: 24px; padding-top: 12px; padding-bottom: 12px; text-align: left; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #000;">
                                    {{ $dutyName }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-blue-200" style="background-color: #bfdbfe; --tw-divide-y-reverse: 0; border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse))); border-bottom-width: calc(1px * var(--tw-divide-y-reverse)); border-color: #e5e7eb;">
                        @foreach ($dutyRostersTopOffice as $week)
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase" style="padding-left: 24px; padding-right: 24px; padding-top: 12px; padding-bottom: 12px; text-align: left; font-size: 14px; font-weight: 500; text-transform: uppercase; color: #000;">
                                    {{ $week['date_range'] }}</th>
                                @foreach ($week['duties'] as $employeeId)
                                    @php
                                        $employee = App\Models\Employee::find($employeeId);
                                    @endphp
                                    <td class="px-6 py-4 whitespace-nowrap" style="white-space: nowrap; padding-left: 24px; padding-right: 24px; padding-top: 16px; padding-bottom: 16px; background-color: {{ $employee->colour }};">
                                        {{ $employee->full_name }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br style="--tw-space-y-reverse: 0; margin-top: calc(16px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(16px * var(--tw-space-y-reverse));">

            <div class="overflow-x-auto mt-8" style="overflow-x: auto; --tw-space-y-reverse: 0; margin-top: calc(16px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(16px * var(--tw-space-y-reverse));">
                <h2 class="text-lg font-bold" style="font-size: 18px; font-weight: 700;">Jadual Bertugas</h2>
                <p class="mb-2" style="margin-bottom: 8px;">Pejabat Bawah</p>
                <table class="table-auto divide-y divide-gray-200" style="table-layout: auto; width: 100%;">
                    <!-- Table Header -->
                    <thead class="bg-gray-50" style="background-color: #f9fafb;">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="padding-left: 24px; padding-right: 24px; padding-top: 12px; padding-bottom: 12px; text-align: left; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em; color: #6b7280;">
                            </th>
                            @foreach ($dutyRostersBottomOffice[0]['duties'] as $dutyId => $employeeName)
                                @php
                                    $dutyName = App\Models\Duty::find($dutyId)->name;
                                @endphp
                                <th class="px-6 py-3 text-left text-sm font-bold text-black bg-gray-200 uppercase tracking-wider" style="background-color: #e5e7eb; padding-left: 24px; padding-right: 24px; padding-top: 12px; padding-bottom: 12px; text-align: left; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #000;">
                                    {{ $dutyName }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-blue-200" style="background-color: #bfdbfe; --tw-divide-y-reverse: 0; border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse))); border-bottom-width: calc(1px * var(--tw-divide-y-reverse)); border-color: #e5e7eb;">
                        @foreach ($dutyRostersBottomOffice as $week)
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase" style="padding-left: 24px; padding-right: 24px; padding-top: 12px; padding-bottom: 12px; text-align: left; font-size: 14px; font-weight: 500; text-transform: uppercase; color: #000;">
                                    {{ $week['date_range'] }}</th>
                                @foreach ($week['duties'] as $employeeId)
                                    @php
                                        $employee = App\Models\Employee::find($employeeId);
                                    @endphp
                                    <td class="px-6 py-4 whitespace-nowrap" style="white-space: nowrap; padding-left: 24px; padding-right: 24px; padding-top: 16px; padding-bottom: 16px; background-color: {{ $employee->colour }};">
                                        {{ $employee->full_name }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
