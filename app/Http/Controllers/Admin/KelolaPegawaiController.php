<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class KelolaPegawaiController extends Controller
{
    public function index()
    {
        // Mulai dengan query dasar
        $query = User::where('peran_id', 2);

        // Jika ada pencarian, tambahkan kondisi pencarian untuk nama dan nama_pengguna
        if (request('cari')) {
            $query->where(function ($query) {
                $query->where('nama', 'like', '%' . request('cari') . '%')
                    ->orWhere('nama_pengguna', 'like', '%' . request('cari') . '%');
            });
        }

        // Paginate hasilnya
        $daftarPegawai = $query->paginate(10);

        // Menambahkan parameter pencarian ke URL pagination
        $daftarPegawai->appends(['cari' => request('cari')]);

        return view('pages.admin.kelola-pegawai.index', [
            'title' => 'Kelola Pegawai',
            'daftarPegawai' => $daftarPegawai
        ]);
    }


    public function create()
    {
        return view('pages.admin.kelola-pegawai.form', [
            'title' => 'Tambah Pegawai',
            'route' => [
                'method' => 'POST',
                'action' => route('kelola-pegawai.store')
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:255',
            'nama_pengguna' => 'required|min:8|max:255|unique:users,nama_pengguna',
            'password' => 'required|min:8|max:255',
            'konfirmasi_password' => 'required|same:password',
        ]);

        $userData = $request->except(['password', 'konfirmasi_password', '_token']);
        $userData['peran_id'] = 2;
        $userData['password'] = Hash::make($request->password);

        User::create($userData);

        return redirect()->route('kelola-pegawai.index')
            ->with('berhasil', 'Pegawai berhasil ditambahkan.');
    }

    public function show(int $id)
    {
        $pegawai = User::find($id);
        return view('pages.admin.kelola-pegawai.detail', [
            'title' => 'Detail Pegawai',
            'pegawai' => $pegawai
        ]);
    }

    public function edit(int $id)
    {
        $pegawai = User::find($id);
        return view('pages.admin.kelola-pegawai.form', [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawai,
            'route' => [
                'method' => 'PUT',
                'action' => route('kelola-pegawai.update', $pegawai->id)
            ]
        ]);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3|max:255',
            'nama_pengguna' => [
                'required',
                'min:8',
                'max:255',
                Rule::unique('users', 'nama_pengguna')->ignore($id)
            ],
            'password' => 'nullable|min:8|max:255',
            'konfirmasi_password' => 'nullable|same:password',
        ]);


        $validated = $request->except(['password', 'konfirmasi_password', '_token']);
        $validated['password'] = Hash::make($request->password);
        $pegawai = User::find($id);
        $pegawai->update($validated);

        return redirect()->route('kelola-pegawai.index')
            ->with('berhasil', 'Pegawai berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $pegawai = User::find($id);
        $pegawai->delete();

        return redirect()->route('kelola-pegawai.index')
            ->with('berhasil', 'Pegawai berhasil dihapus.');
    }
}
