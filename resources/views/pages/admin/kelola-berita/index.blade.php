@extends('layouts.auth.layout')

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    <div class="flex w-full justify-between flex-wrap gap-4">
        <x-button href="{{ route('kelola-berita.create') }}">Tambah Berita</x-button>
        <form action="{{ route('kelola-berita.index') }}" method="get" class="flex gap-4 flex-wrap">
            <x-textfield value="{{ request('cari') }}" name="cari" placeholder="Cari Berita" />
            <x-button type="submit">Cari</x-button>
            @if (request('cari'))
                <x-button color="red" class="w-fit" href="{{ route('kelola-berita.index') }}">Hapus pencarian</x-button>
            @endif
        </form>
    </div>

    @if (session('berhasil'))
        <x-alert type="success">{{ session('berhasil') }}</x-alert>
    @endif

    <x-table>
        <x-table.thead>
            <x-table.th>NO.</x-table.th>
            <x-table.th>Judul Berita</x-table.th>
            <x-table.th>Isi Berita</x-table.th>
            <x-table.th>Gambar</x-table.th>
            <x-table.th>Tanggal Dibuat</x-table.th>
            <x-table.th>Aksi</x-table.th>
        </x-table.thead>
        @if (count($daftarBerita) > 0)
            @foreach ($daftarBerita as $berita)
                <x-table.tbody>
                    <x-table.td>{{ ($daftarBerita->currentPage() - 1) * $daftarBerita->perPage() + $loop->iteration }}.</x-table.td>
                    <x-table.td>{{ $berita->judul }}</x-table.td>
                    <x-table.td>{{ $berita->isi }}</x-table.td>
                    <x-table.td>
                        <img class="aspect-[3/2] h-28 object-cover object-center" src="{{ '/storage/' . $berita->gambar }}">
                    </x-table.td>
                    <x-table.td>{{ $berita->created_at }}</x-table.td>
                    <x-table.td>
                        <div class="flex gap-2 flex-wrap">
                            <x-button href="{{ route('kelola-berita.edit', $berita->id) }}">Edit</x-button>
                            <x-button color="yellow"
                                href="{{ route('kelola-berita.show', $berita->id) }}">Detail</x-button>
                            <form id="hapusFormBerita{{ $berita->id }}"
                                action="{{ route('kelola-berita.destroy', $berita->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <x-button onclick="showModalDialog(`{{ $berita->judul }}`, {{ $berita->id }})"
                                    color="red">Hapus</x-button>
                            </form>
                        </div>
                    </x-table.td>
                </x-table.tbody>
            @endforeach
        @else
            <x-table.tbody>
                <x-table.td colspan="6" class="text-center">Data kosong!</x-table.td>
            </x-table.tbody>
        @endif
    </x-table>

    {{ $daftarBerita->links() }}


    <script>
        function showModalDialog(judulBerita, idberita) {
            const form = document.getElementById(`hapusFormBerita${idberita}`);
            event.preventDefault();
            Swal.fire({
                title: "Hapus berita?",
                text: "Hapus berita " + judulBerita + "?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#2563eb",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endsection
