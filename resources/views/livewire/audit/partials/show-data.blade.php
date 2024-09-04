<div class="overflow-hidden">
    <div class="divide-y overflow-hidden">
        <div class="grid grid-cols-5 py-2">
            <div>
                Pengguna
            </div>
            <div>
                {{ $audit->user->name }}
            </div>
        </div>
        <div class="grid grid-cols-5 py-4">
            <div>
                Jenis Perubahan
            </div>
            <div>
                {{ $audit->event }}
            </div>
        </div>
        <div class="grid grid-cols-5 py-4">
            <div>
                Model
            </div>
            <div>
                {{ $audit->auditable_type }}
            </div>
        </div>
        <div class="grid grid-cols-5 py-4">
            <div>
                Alamat IP
            </div>
            <div>
                {{ $audit->ip_address }}
            </div>
        </div>
        <div class="grid grid-cols-5 py-4">
            <div>
                Berlaku Pada
            </div>
            <div>
                {{ $audit->created_at }}
            </div>
        </div>
        <div class="grid grid-cols-5 py-4">
            <div>
                Pautan
            </div>
            <div class="col-span-4">
                {{ $audit->url }}
            </div>
        </div>
        <div class="grid grid-cols-5 py-4">
            <div>
                Pelayar
            </div>
            <div class="col-span-4">
                {{ $audit->user_agent }}
            </div>
        </div>
        @if (count($data))
            <div class="grid grid-cols-5 py-4 overflow-auto">
                <div>
                    Data
                </div>
                <div class="col-span-4">
                    <table class="table-auto border-collapse">
                        <thead>
                            <th class="p-4 text-left">Medan</th>
                            <th class="p-4 text-left">Dari</th>
                            <th class="p-4 text-left">Kepada</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="p-4">{{ $item }}</td>
                                    <td class="p-4">
                                        {{ array_key_exists($item, $audit->old_values) ? $audit->old_values[$item] : null }}
                                    </td>
                                    <td class="p-4">
                                        {{ array_key_exists($item, $audit->new_values) ? $audit->new_values[$item] : null }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
