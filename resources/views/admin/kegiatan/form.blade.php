<div class="mb-6">
    <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">Judul Kegiatan</label>
    <input type="text" name="judul" id="judul" value="{{ old('judul', $kegiatan->judul ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                  sm:text-sm transition duration-150 ease-in-out
                  placeholder-gray-400" placeholder="Masukkan judul kegiatan..." required>
    @error('judul')
    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
</div>

<div class="mb-6">
    <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Kegiatan</label>
    <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                     focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                     sm:text-sm transition duration-150 ease-in-out
                     placeholder-gray-400" rows="7"
        placeholder="Jelaskan detail kegiatan secara lengkap...">{{ old('deskripsi', $kegiatan->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Kegiatan</label>
    <input type="date" name="tanggal" id="tanggal"
        value="{{ old('tanggal', isset($kegiatan) && $kegiatan->tanggal ? $kegiatan->tanggal->format('Y-m-d') : '') }}"
        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                  sm:text-sm transition duration-150 ease-in-out">
    @error('tanggal')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">Kategori Kegiatan</label>
    <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $kegiatan->kategori ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                  sm:text-sm transition duration-150 ease-in-out
                  placeholder-gray-400" placeholder="Contoh: Seminar, Workshop, Lomba...">
    @error('kategori')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="poster" class="block text-sm font-semibold text-gray-700 mb-2">Unggah Poster</label>
    <div class="flex items-center gap-4">
        <input type="file" name="poster" id="poster" class="block w-full text-sm text-gray-500
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-full file:border-0
                      file:text-sm file:font-semibold
                      file:bg-blue-50 file:text-blue-700
                      hover:file:bg-blue-100 transition duration-150
                      cursor-pointer">
        @if(isset($kegiatan) && $kegiatan->poster)
            <div class="relative w-24 h-24 sm:w-32 sm:h-32 flex-shrink-0">
                <img src="{{ asset('storage/' . $kegiatan->poster) }}" alt="Current Poster"
                    class="object-cover w-full h-full rounded-lg shadow-md border border-gray-200">
                <span
                    class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-sm">
                    Current
                </span>
            </div>
        @endif
    </div>
    @error('poster')
        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
    @enderror
    <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, GIF (max 2MB)</p> {{-- Added helper text --}}
</div>