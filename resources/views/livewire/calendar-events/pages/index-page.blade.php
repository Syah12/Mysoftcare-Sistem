<div>
    <div class="flex flex-row-reverse">
        @foreach ($tabs as $key => $item)
            <div class="mb-4 inline-flex">
                <a href="{{ route('calendar-event.index', ['tab' => $key]) }}"
                    class="px-4 py-2 rounded-lg  border border-gray-200 {{ $currentTab === $key ? 'bg-blue-200' : 'bg-white' }} mr-4">
                    {!! $item['icon'] !!}
                </a>
            </div>
        @endforeach
    </div>
    <livewire:is :component="$tabs[$currentTab]['component']" :key="$currentTab" />
</div>
