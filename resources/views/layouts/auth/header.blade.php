{{-- 

    COPY HERE:

    <a href="{{ route('kelola-pegawai.index') }}"
        class="{{ Request::is('admin/kelola-pegawai*') ? 'bg-primary/10' : 'opacity-70' }}
    w-full flex items-center p-3 gap-2 relative hover:opacity-100">
        <box-icon class="fill-white" name='group'></box-icon>
        <span class="font-semibold text-lg">Kelola Pegawai</span>
        @if (Request::is('admin/kelola-pegawai*'))
            <div class="w-1 absolute h-full bg-primary right-0"></div>
        @endif
    </a>

--}}

<div x-data="{ isOpenSidebarMenu: false }" class="z-30">
    <header x-data="{ isOpenProfileMenu: false }"
        class="fixed bg-white w-full h-20 flex items-center justify-between px-8 max-md:px-4 md:pl-64 z-10">
        <h1 class="text-3xl font-bold max-md:hidden">{{ $title }}</h1>
        <div class="flex md:hidden">
            <box-icon x-show="!isOpenSidebarMenu" @click="isOpenSidebarMenu = true" class="size-10"
                name='menu-alt-left'></box-icon>
            <box-icon x-show="isOpenSidebarMenu" @click="isOpenSidebarMenu = false" name='x'
                class="size-10"></box-icon>
        </div>
        <div class="flex gap-2 cursor-pointer relative" @click="isOpenProfileMenu = !isOpenProfileMenu">
            <box-icon name='chevron-down'></box-icon>
            <h1>{{ Auth::user()->nama }}</h1>
        </div>

        <div x-cloak x-show="isOpenProfileMenu" x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="bg-white absolute top-24 p-3 rounded-lg shadow right-8 max-md:right-4 w-44">
            <h1>{{ Auth::user()->namaPeran->nama_peran }}</h1>
            <div class="w-full h-0.5 bg-black/10 my-2"></div>
            <p class="text-gray-500">Username:</p>
            <h1 class="mb-2 font-semibold">{{ Auth::user()->nama_pengguna }}</h1>
            <x-button.back href="{{ url('/') }}" class="flex mt-4 w-full" />
            <form action="{{ route('logout') }}" method="post" class="mt-3 flex">
                @csrf
                <x-button color="red" type="submit" size="small" class="w-full !justify-start">
                    <box-icon class="fill-white -ml-1" name='log-out'></box-icon>
                    Logout
                </x-button>
            </form>
        </div>
    </header>

    <aside class="fixed top-0 bg-slate-900 text-white w-60 h-screen pb-4 duration-150 z-20"
        x-bind:class="{
            'left-0': isOpenSidebarMenu,
            'max-md:-left-64': !isOpenSidebarMenu
        }">
        <div class="flex h-20 items-center max-md:justify-between md:justify-center px-5">
            <h1 class="font-bold text-3xl">UrLogo</h1>
            <box-icon @click="isOpenSidebarMenu = false" class="fill-white size-12 md:hidden" name='x'></box-icon>
        </div>
        <nav class="w-full flex flex-col mt-4 gap-2">
            {{-- DASHBOARD --}}
            <a href="{{ route('admin.dashboard') }}"
                class="
            {{ Request::is('admin/dashboard*') ? 'bg-primary/10' : 'opacity-70' }}
            w-full flex items-center p-3 gap-2 relative hover:opacity-100">
                <box-icon class="fill-white" name='dashboard' type='solid'></box-icon>
                <span class="font-semibold text-lg">Dashboard</span>
                @if (Request::is('admin/dashboard*'))
                    <div class="w-1 absolute h-full bg-primary right-0"></div>
                @endif
            </a>
            {{-- KELOLA BERITA --}}
            <a href="{{ route('kelola-berita.index') }}"
                class="{{ Request::is('admin/kelola-berita*') ? 'bg-primary/10' : 'opacity-70' }}
            w-full flex items-center p-3 gap-2 relative hover:opacity-100">
                <box-icon class="fill-white" name='news' type="solid"></box-icon>
                <span class="font-semibold text-lg">Kelola Berita</span>
                @if (Request::is('admin/kelola-berita*'))
                    <div class="w-1 absolute h-full bg-primary right-0"></div>
                @endif
            </a>
            {{-- KELOLA PEGAWAI --}}
            <a href="{{ route('kelola-pegawai.index') }}"
                class="{{ Request::is('admin/kelola-pegawai*') ? 'bg-primary/10' : 'opacity-70' }}
            w-full flex items-center p-3 gap-2 relative hover:opacity-100">
                <box-icon class="fill-white" name='group'></box-icon>
                <span class="font-semibold text-lg">Kelola Pegawai</span>
                @if (Request::is('admin/kelola-pegawai*'))
                    <div class="w-1 absolute h-full bg-primary right-0"></div>
                @endif
            </a>
        </nav>
    </aside>
</div>
