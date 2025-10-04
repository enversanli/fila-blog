<form method="GET" action="{{ route('events.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <!-- City Select -->
    <select name="city" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-500 transition">
        <option value="" selected>Tümü</option>
        @foreach($cities as $city)
            <option value="{{ $city->slug }}" {{ request('city') == $city->slug ? 'selected' : '' }}>
                {{ $city->name }}
            </option>
        @endforeach
    </select>

    <!-- Category Select -->
    <select name="category" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-500 transition">
        <option value="" selected>Tümü</option>
        @foreach($categories as $category)
            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <!-- Type Select -->
    <select name="type" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-500 transition">
        <option value="" selected>Tümü</option>
        @foreach($types as $type)
            <option value="{{ $type->slug }}" {{ request('type') == $type->slug ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>

    <!-- Price Filter -->
    <select name="price" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-500 transition">
        <option value="" selected>Tümü</option>
        <option value="paid" {{ request('price') == 'paid' ? 'selected' : '' }}>Ücretli</option>
        <option value="free" {{ request('price') == 'free' ? 'selected' : '' }}>Ücretsiz</option>
    </select>

    <!-- Buttons -->
    <div class="md:col-span-4 flex justify-between mt-4">
        <button type="submit" class="px-6 py-2 bg-orange-500 text-white font-semibold rounded-lg shadow hover:bg-orange-600 transition transform hover:-translate-y-0.5">
            Filtrele
        </button>
        <a href="{{ route('events.index') }}" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300 transition transform hover:-translate-y-0.5">
            Reset
        </a>
    </div>
</form>
