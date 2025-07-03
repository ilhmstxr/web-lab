{{-- resources/views/public/partials/_research_list.blade.php --}}

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($research as $r)
        <div class="bg-white rounded-xl border border-gray-200 shadow-md overflow-hidden flex flex-col justify-between">
            {{-- Isi Card Anda di sini --}}
            <div class="p-5">
                <div class="flex items-center space-x-2 text-xs text-gray-500 mb-2">
                    <span>{{ $r->category->name ?? 'No Category' }}</span><span>&bull;</span><span>{{ $r->topic->name ?? 'No Topic' }}</span>
                </div>
                <h3 class="text-lg font-bold mb-2 text-gray-900">{{ $r->title }}</h3>
                <div class="inline-flex p-1 gap-2 items-center space-x-2 text-xs text-gray-500 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <p class="text-sm">{{ $r->author }}</p>
                </div>
                <div class="inline-flex p-1 gap-2 items-center space-x-2 text-xs text-gray-500 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>

                    <p class="text-sm">{{ $r->year }}</p>
                </div>
            </div>
            <div class="p-5 pt-0">
                <button
                    class="w-full bg-gray-50 border border-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg hover:bg-gray-200 transition-colors">View
                    Summary</button>
            </div>
        </div>
    @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
            <p class="text-gray-500">No research found matching your criteria.</p>
        </div>
    @endforelse
</div>

{{-- Tampilkan link paginasi --}}
<div class="mt-8">
    {{ $research->links() }}
</div>
