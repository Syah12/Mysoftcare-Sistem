<div>
    @foreach ($tabs as $key => $item)
        <div class="mb-4 inline-flex">
            <a href="{{ route('calendar-event.index', ['tab' => $key]) }}"
                class="px-4 py-2 rounded-lg shadow-md border border-gray-200 {{ $currentTab === $key ? 'bg-blue-100' : 'bg-white' }} mr-4">
                 {!! $item['icon'] !!}
             </a>
        </div>
    @endforeach
    <livewire:is :component="$tabs[$currentTab]['component']" :key="$currentTab" />
</div>
