{{-- 

    COPY:
    
    <section class="w-full flex justify-center">
        <span id="berita" class="absolute -translate-y-20"></span>
        <div class="w-full max-w-4xl flex flex-col p-8 max-sm:p-4">
            <h1 class="text-3xl font-bold text-primary w-fit mb-8">
                Berita Kami
                <div class="w-3/4 h-1 bg-primary mt-2"></div>
            </h1>
            // Code here ....
        </div>
    </section>

--}}

@php
    use Carbon\Carbon;
@endphp

@extends('layouts.layout')

@section('content')
    @include('layouts.header')

    <main>
        <section class="w-full h-screen !bg-cover !bg-center pt-20 flex items-center justify-center text-white flex-col"
            style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/welcome/beranda-bg.jpg') }}');">
            <div class="w-full max-w-4xl flex flex-col items-center p-8 max-sm:p-4">
                <h1 class="font-bold text-4xl text-center" id="home-title">Welcome to our Website</h1>
                <p id="home-desc" class="text-center mt-2 opacity-90">Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Dolore
                    culpa, in totam
                    maiores cupiditate
                    expedita
                    cumque quos rerum hic fuga optio nobis placeat ipsum temporibus!</p>
                <div id="home-button" class="mt-4">
                    <x-button href="#tentang">Explore</x-button>
                </div>
            </div>
        </section>

        <section class="w-full flex justify-center">
            <div class="w-full max-w-4xl flex justify-evenly p-8 max-sm:p-4 flex-wrap gap-4">
                <img class="h-12 max-sm:h-10"
                    src="https://static-00.iconduck.com/assets.00/laravel-icon-1990x2048-xawylrh0.png">
                <img class="h-12 max-sm:h-10"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9FxiHJarAk6MJ0bNOEEM47rllqHOKiBpsuA&s">
                <img class="h-12 max-sm:h-10" src="https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png">
            </div>
        </section>

        <section class="flex justify-center bg-gradient-to-r from-white to-blue-100">
            <span id="tentang" class="absolute -translate-y-20"></span>
            <div class="w-full max-w-4xl flex max-sm:flex-col-reverse items-center gap-8 p-8 max-sm:p-4">
                <div class="w-[70%] max-sm:w-full">
                    <h1 class="text-3xl font-bold text-primary w-fit">
                        Tentang Kami
                        <div class="w-3/4 h-1 bg-gradient-to-r from-primary to-blue-500 mt-2"></div>
                    </h1>
                    <p class="mt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt dolorum minus sequi
                        eos vel
                        delectus aspernatur cumque atque ipsum consequuntur ipsa culpa exercitationem, iure labore dolores
                        nostrum facere hic impedit eaque natus distinctio numquam laboriosam cum accusantium! Cum quibusdam
                        veritatis atque culpa rerum minima dolores ab dolor vel, odio commodi!</p>
                </div>
                <div class="w-72 max-sm:w-full h-96 max-sm:h-52 overflow-hidden">
                    <img src="{{ asset('images/welcome/about.jpg') }}"
                        class="w-full h-full object-cover object-center cursor-pointer hover:scale-110 duration-150">
                </div>
            </div>
        </section>

        <section class="w-full flex justify-center">
            <span id="berita" class="absolute -translate-y-20"></span>
            <div class="w-full max-w-4xl flex flex-col p-8 max-sm:p-4">
                <h1 class="text-3xl font-bold text-primary w-fit mb-8">
                    Berita Kami
                    <div class="w-3/4 h-1 bg-primary mt-2"></div>
                </h1>

                <main class="grid grid-cols-2 max-sm:grid-cols-1 gap-4">
                    @foreach ($daftarBerita as $berita)
                        <div>
                            <div class="w-full aspect-[3/2] rounded-xl overflow-hidden">
                                <img class="hover:scale-110 duration-300 object-cover object-center w-full h-full"
                                    src="{{ 'storage/' . $berita->gambar }}">
                            </div>
                            <h1 class="text-gray-500 text-sm mt-2">
                                {{ Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                            </h1>
                            <h1 class="font-semibold text-lg">{{ $berita->judul }}</h1>
                            <p class="mb-2 text-gray-500">
                                {{ Str::limit($berita->isi, 50) }}
                            </p>
                            <a href="" class="text-blue-500 hover:underline">Baca artikel</a>
                        </div>
                    @endforeach
                </main>
            </div>
        </section>

        <section class="flex justify-center bg-gradient-to-r from-secondary to-primary">
            <span id="kontak" class="absolute -translate-y-20"></span>
            <div class="w-full max-w-4xl flex max-sm:flex-col gap-8 p-8 max-sm:px-4">
                <form action="https://formsubmit.co/arrykusumaputra2004@gmail.com" method="POST"
                    class="w-[70%] max-sm:w-full">
                    <h1 class="text-3xl font-bold text-white w-fit mb-8">
                        Kontak Kami
                        <div class="w-3/4 h-1 bg-white mt-2"></div>
                    </h1>
                    <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-4 mb-4">
                        <div class="flex flex-col">
                            <label for="nama" class="text-white font-semibold text-lg mb-2">Nama</label>
                            <input id="nama" type="text" placeholder="Nama Anda" name="nama"
                                class="px-3 py-2 bg-blue-700 text-white outline-none rounded-md focus:ring-4 ring-blue-400 duration-150">
                        </div>
                        <div class="flex flex-col">
                            <label for="email" class="text-white font-semibold text-lg mb-2">Email</label>
                            <input id="email" type="email" placeholder="Email Anda" name="email"
                                class="px-3 py-2 bg-blue-700 text-white outline-none rounded-md focus:ring-4 ring-blue-400 duration-150">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="pesan" class="text-white font-semibold text-lg mb-2">Pesan</label>
                        <textarea name="pesan" id="pesan" rows="5" placeholder="Masukkan pesan"
                            class="resize-none px-3 py-2 bg-blue-700 text-white outline-none rounded-md focus:ring-4 ring-blue-400 duration-150"></textarea>
                    </div>

                    <x-button type="submit" class="mt-4 w-full">Kirim</x-button>
                </form>
                <iframe class="w-1/2 max-sm:w-full max-sm:h-64"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21179.682501041832!2d114.7524732314974!3d-3.443105394602542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6837accc01197%3A0x8495c1e820eda6c6!2sBandar%20Udara%20Internasional%20Syamsudin%20Noor!5e1!3m2!1sid!2sid!4v1733923690284!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

    </main>

    @include('layouts.footer')

    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        ScrollReveal({
            reset: true,
            origin: 'bottom',
            distance: '15px',
            delay: 300
        })
        ScrollReveal().reveal('#home-title');
        ScrollReveal().reveal('#home-desc', {
            delay: 500
        });
        ScrollReveal().reveal('#home-button', {
            delay: 700
        });
    </script>
@endsection
