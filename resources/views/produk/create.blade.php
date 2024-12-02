
<x-app-layout>
    <div class="max-w-4xl py-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Tambah Produk</h1>

        <!-- Pesan error secara umum jika ada kesalahan -->
        @if ($errors->any())
            <div class="p-4 mb-6 text-red-700 bg-red-100 rounded-lg">
                <ul class="pl-5 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf



            <!-- Input Nama Produk -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Nama Produk</label>
                <input type="text" name="nama_produk" class="block w-full mt-1 border-gray-300 rounded-md" value="{{ old('nama_produk') }}" />
                @error('nama_produk')
                    <div class="mt-2 text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <!-- Input Harga -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Harga</label>
                <input type="text" name="harga" class="block w-full mt-1 border-gray-300 rounded-md" value="{{ old('harga') }}" />
            </div>
              <!-- Input Deskripsi -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Deskripsi</label>
                <textarea name="deskripsi" id="editor" rows="5" class="block w-full mt-1 border-gray-300 rounded-md" placeholder="Ketikkan Deskrisi disini">{{ old('deskripsi') }}</textarea>
                <!-- Pesan error untuk Isi Berita -->
                @error('deskripsi')
                    <div class="p-2 mt-2 text-red-700 bg-red-100 border-l-4 border-red-500 rounded-lg">
                        <svg class="inline-block w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 0a9 9 0 100-18 9 9 0 000 18z" />
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- Input Gambar -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Gambar</label>
                <input type="file" name="gambar" class="block w-full mt-1" accept="image/*" />
                @error('gambar')
                    <div class="mt-2 text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="px-4 py-2 text-white transition-all duration-200 bg-blue-500 rounded hover:bg-blue-600">
                Simpan
            </button>
        </form>
    </div>

    <!-- CKEditor initialization -->
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
