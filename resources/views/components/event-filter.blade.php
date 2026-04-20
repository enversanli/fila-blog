<div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6 mb-10">
    <form method="GET" action="{{ route('events.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-5">

        {{-- City --}}
        <div class="flex flex-col gap-1.5">
            <label for="city" class="text-xs font-bold tracking-wider uppercase text-gray-500">Şehir</label>
            <select id="city" name="city"
                    class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-700 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition w-full">
                <option value="">Tümü</option>
                @foreach($cities as $city)
                    <option value="{{ $city->slug }}" {{ request('city') == $city->slug ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Category --}}
        <div class="flex flex-col gap-1.5">
            <label for="category" class="text-xs font-bold tracking-wider uppercase text-gray-500">Kategori</label>
            <select id="category" name="category"
                    class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-700 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition w-full">
                <option value="">Tümü</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Type --}}
        <div class="flex flex-col gap-1.5">
            <label for="type" class="text-xs font-bold tracking-wider uppercase text-gray-500">Tür</label>
            <select id="type" name="type"
                    class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-700 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition w-full">
                <option value="">Tümü</option>
                @foreach($types as $type)
                    <option value="{{ $type->slug }}" {{ request('type') == $type->slug ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Price --}}
        <div class="flex flex-col gap-1.5">
            <label for="price" class="text-xs font-bold tracking-wider uppercase text-gray-500">Fiyat</label>
            <select id="price" name="price"
                    class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-700 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition w-full">
                <option value="">Tümü</option>
                <option value="paid" {{ request('price') == 'paid' ? 'selected' : '' }}>Ücretli</option>
                <option value="free" {{ request('price') == 'free' ? 'selected' : '' }}>Ücretsiz</option>
            </select>
        </div>

        {{-- Buttons --}}
        <div class="md:col-span-4 flex items-center justify-between pt-2 border-t border-gray-100 mt-1">
            <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-orange-500 text-white text-sm font-semibold rounded-xl shadow hover:bg-orange-600 transition hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                </svg>
                Filtrele
            </button>
            <a href="{{ route('events.index') }}"
               class="inline-flex items-center gap-2 px-6 py-2.5 bg-gray-100 text-gray-700 text-sm font-semibold rounded-xl hover:bg-gray-200 transition hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Sıfırla
            </a>
        </div>
    </form>
</div>