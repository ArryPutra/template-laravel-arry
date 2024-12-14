@extends('layouts.layout')

@push('head')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

@section('content')
    <main class="bg-blue-50 w-full min-h-screen flex flex-col items-center justify-center">

        <section class="bg-white p-6 rounded-lg border-2 border-blue-100 shadow w-full max-w-96">


            <h1 class="font-extrabold text-3xl text-primary">{{ $title }}</h1>

            @if (session('gagal'))
                <x-alert>{{ session('gagal') }}</x-alert>
            @endif
            @if (session('berhasil'))
                <x-alert type="success">{{ session('berhasil') }}</x-alert>
            @endif


            <form action="{{ route('login.post') }}" method="POST" class="flex flex-col gap-2 mt-6">
                @csrf

                <x-textfield value="arrykusumaputra" name="nama_pengguna" label="Nama Pengguna" placeholder="Nama Pengguna" />
                <x-textfield value="password123" name="password" label="Password" placeholder="Password" type="password" />
                <p>Belum punya akun? <a href="{{ route('register') }}"
                        class="font-semibold text-primary hover:underline">Register</a></p>
                <div class="g-recaptcha mt-2" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                @error('g-recaptcha-response')
                    <p class="text-red-600 mt-2">ReCaptcha wajib diisi.</p>
                @enderror
                <x-button class="w-full" type="submit">Login</x-button>
            </form>
        </section>

        <a href="/" class="text-blue-500 hover:underline text-start w-full max-w-96 mt-4">
            Kembali Halaman Beranda
        </a>

    </main>

    <script>
        function resizeRecaptcha() {
            const recaptchaWidget = document.querySelector('.g-recaptcha');
            if (recaptchaWidget) {
                // Get the parent width
                const containerWidth = recaptchaWidget.parentElement.offsetWidth;

                // Define the default reCAPTCHA width
                const reCaptchaWidth = 305; // Default reCAPTCHA width in pixels
                const scale = containerWidth / reCaptchaWidth;

                // Apply the scale to the widget
                recaptchaWidget.style.transform = `scale(${scale})`;
                recaptchaWidget.style.transformOrigin = '0 0';
                recaptchaWidget.style.width = `${reCaptchaWidth * scale}px`;
                recaptchaWidget.style.height = `${78 * scale}px`; // Default reCAPTCHA height
            }
        }

        // Run the function on load and on resize
        window.onload = resizeRecaptcha;
        window.onresize = resizeRecaptcha;
    </script>
@endsection
