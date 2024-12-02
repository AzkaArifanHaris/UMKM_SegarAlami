


<x-app-layout>
    <div class="max-w-4xl py-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Daftar Produk</h1>

        @if (session('success'))
            <div class="p-3 mb-4 text-white bg-green-500">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-3 mb-4 text-white bg-red-500">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('produk.create') }}" class="inline-block px-4 py-2 mb-4 text-white bg-blue-500 rounded">
            Tambah Produk
        </a>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($produk as $item)
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <img src="{{ Storage::url($item->gambar) }}" class="object-cover w-full h-48" alt="Gambar Berita" />
                    <div class="p-4">
                        <h2 class="text-lg font-bold">{{ $item->nama_produk }}</h2>
                       <p class="text-lg font-bold"> {{ $item->harga }}</p>
                        <p class="mt-2 text-gray-600">{!! Str::limit($item->deskripsi, 100) !!}</p>
                        <div class="mt-4">
                            <a href="{{ route('produk.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 text-red-500 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
