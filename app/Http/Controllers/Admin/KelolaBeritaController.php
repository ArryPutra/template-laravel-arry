<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KelolaBeritaController extends Controller
{
    public function index()
    {
        // Mulai dengan query dasar
        $query = Berita::query();

        // Jika ada pencarian, tambahkan kondisi pencarian untuk nama dan nama_pengguna
        if (request('cari')) {
            $query->where(function ($query) {
                $query->where('nama', 'like', '%' . request('cari') . '%')
                    ->orWhere('nama_pengguna', 'like', '%' . request('cari') . '%');
            });
        }

        // Paginate hasilnya
        $daftarBerita = $query->paginate(10);

        // Menambahkan parameter pencarian ke URL pagination
        $daftarBerita->appends(['cari' => request('cari')]);

        return view('pages.admin.kelola-berita.index', [
            'title' => 'Kelola Berita',
            'daftarBerita' => $daftarBerita
        ]);
    }


    public function create()
    {
        return view('pages.admin.kelola-berita.form', [
            'title' => 'Tambah Berita',
            'route' => [
                'method' => 'POST',
                'action' => route('kelola-berita.store')
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $validated['gambar'] = $request->file('gambar')->store('berita');

        Berita::create($validated);

        return redirect()->route('kelola-berita.index')
            ->with('berhasil', 'Berita berhasil ditambahkan.');
    }

    public function show(int $id)
    {
        $berita = Berita::find($id);
        return view('pages.admin.kelola-berita.detail', [
            'title' => 'Detail Berita',
            'berita' => $berita
        ]);
    }

    public function edit(int $id)
    {
        $berita = Berita::find($id);
        return view('pages.admin.kelola-berita.form', [
            'title' => 'Edit Berita',
            'berita' => $berita,
            'route' => [
                'method' => 'PUT',
                'action' => route('kelola-berita.update', $berita->id)
            ]
        ]);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $berita = Berita::find($id);

        if ($request->file('gambar')) {
            Storage::delete($berita->gambar);
            $validated['gambar'] = $request->file('gambar')->store('berita');
        }
        $berita->update($validated);

        return redirect()->route('kelola-berita.index')
            ->with('berhasil', 'Berita berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $berita = Berita::find($id);
        Storage::delete($berita->gambar);
        $berita->delete();

        return redirect()->route('kelola-berita.index')
            ->with('berhasil', 'Berita berhasil dihapus.');
    }
}
