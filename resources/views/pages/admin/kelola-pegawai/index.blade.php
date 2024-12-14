@extends('layouts.auth.layout')

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    <div class="flex w-full justify-between flex-wrap gap-4">
        <x-button href="{{ route('kelola-pegawai.create') }}">Tambah Pegawai</x-button>
        <form action="{{ route('kelola-pegawai.index') }}" method="get" class="flex gap-4 flex-wrap">
            <x-textfield value="{{ request('cari') }}" name="cari" placeholder="Cari Pegawai" />
            <x-button type="submit">Cari</x-button>
            @if (request('cari'))
                <x-button color="red" class="w-fit" href="{{ route('kelola-pegawai.index') }}">Hapus pencarian</x-button>
            @endif
        </form>
    </div>

    @if (session('berhasil'))
        <x-alert type="success">{{ session('berhasil') }}</x-alert>
    @endif

    <x-table>
        <x-table.thead>
            <x-table.th>NO.</x-table.th>
            <x-table.th>Nama Pegawai</x-table.th>
            <x-table.th>Nama Pengguna</x-table.th>
            <x-table.th>Tanggal Dibuat</x-table.th>
            <x-table.th>Aksi</x-table.th>
        </x-table.thead>
        @if (count($daftarPegawai) > 0)
            @foreach ($daftarPegawai as $pegawai)
                <x-table.tbody>
                    <x-table.td>{{ ($daftarPegawai->currentPage() - 1) * $daftarPegawai->perPage() + $loop->iteration }}.</x-table.td>
                    <x-table.td>{{ $pegawai->nama }}</x-table.td>
                    <x-table.td>{{ $pegawai->nama_pengguna }}</x-table.td>
                    <x-table.td>{{ $pegawai->created_at }}</x-table.td>
                    <x-table.td>
                        <div class="flex gap-2 flex-wrap">
                            <x-button href="{{ route('kelola-pegawai.edit', $pegawai->id) }}">Edit</x-button>
                            <x-button color="yellow"
                                href="{{ route('kelola-pegawai.show', $pegawai->id) }}">Detail</x-button>
                            <form id="hapusFormPegawaId{{ $pegawai->id }}"
                                action="{{ route('kelola-pegawai.destroy', $pegawai->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <x-button onclick="showModalDialog(`{{ $pegawai->nama }}`, {{ $pegawai->id }})"
                                    color="red">Hapus</x-button>
                            </form>
                        </div>
                    </x-table.td>
                </x-table.tbody>
            @endforeach
        @else
            <x-table.tbody>
                <x-table.td colspan="4" class="text-center">Data kosong!</x-table.td>
            </x-table.tbody>
        @endif
    </x-table>

    {{ $daftarPegawai->links() }}


    <script>
        function showModalDialog(namaPegawai, idPegawai) {
            const form = document.getElementById(`hapusFormPegawaId${idPegawai}`);
            event.preventDefault();
            Swal.fire({
                title: "Hapus Pegawai?",
                text: "Hapus pegawai " + namaPegawai + "?",
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
