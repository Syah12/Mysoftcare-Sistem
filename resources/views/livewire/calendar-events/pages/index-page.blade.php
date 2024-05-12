<div>
    <div class="flex flex-row-reverse gap-2">
        @foreach ($tabs as $key => $item)
            <div class="pb-6 inline-flex">
                <a href="{{ route('calendar-event.index', ['tab' => $key]) }}"
                    class="px-4 py-2 rounded-lg border border-gray-200 {{ $currentTab === $key ? 'bg-yellow-100' : 'bg-white' }}">
                    {!! $item['icon'] !!}
                </a>
            </div>
        @endforeach
    </div>
    <livewire:is :component="$tabs[$currentTab]['component']" :key="$currentTab" />
</div>
