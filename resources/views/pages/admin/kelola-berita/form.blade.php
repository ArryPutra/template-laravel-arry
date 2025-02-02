@extends('layouts.auth.layout')

@section('content')
    <x-button.back href="{{ route('kelola-berita.index') }}" />
    <form action="{{ $route['action'] }}" method="POST" enctype="multipart/form-data"
        class="flex bg-white rounded-lg flex-col gap-2 mt-4">
        @csrf
        @method($route['method'])
        <x-textfield name="judul" value="{{ old('judul', $berita->judul ?? '') }}" placeholder="Masukkan judul berita"
            label="Judul Berita" />
        <x-textfield.area name="isi" value="{{ old('isi', $berita->isi ?? '') }}" placeholder="Masukkan isi berita"
            label="Isi Berita" />
        <x-dropdown name="kategori" label="Pilih Kategori">
            @foreach ($daftarKategoriBerita as $kategori)
                <x-dropdown.option value="{{ $kategori->id }}" :selected="old('kategori', $berita->kategori_id ?? false) == $kategori->id">
                    {{ $kategori->nama_kategori }}
                </x-dropdown.option>
            @endforeach
        </x-dropdown>
        <x-file-input id="inputGambar" name="gambar" label="Unggah Gambar" />
        <img id="gambarPreview" src="{{ $berita->gambar ?? false ? '/storage/' . $berita->gambar : false }}"
            class="{{ $route['method'] == 'POST' ? 'hidden' : false }} w-60 object-cover rounded-md">
        <x-button type="submit" class="w-fit mt-2">
            @if ($route['method'] == 'POST')
                Tambah
            @else
                Perbarui
            @endif
            Berita
        </x-button>
    </form>

    <script>
        const inputGambar = document.getElementById('inputGambar');
        inputGambar.addEventListener('change', (event) => {
            const file = event.target.files[0];
            const validFileType = ['image/jpeg', 'image/png', 'image/jpg'];
            if (file && validFileType.includes(file.type)) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('gambarPreview');
                    previewImage.classList.remove('hidden');
                    previewImage.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
