<header id="header" x-data="{ open: false }"
    class="border-b border-none h-20 flex items-center justify-center px-8 fixed w-full max-sm:px-4 duration-150 z-20">
    <div class="w-full max-w-4xl h-full flex items-center justify-between">
        <h1 id="headerTitle" class="font-extrabold text-3xl text-white">UrLogo</h1>
        <div class="flex gap-8 max-sm:gap-4 sm:items-center max-sm:absolute max-sm:bg-primary max-sm:text-white max-sm:top-20 max-sm:left-0 max-sm:w-full max-sm:flex max-sm:flex-col overflow-hidden duration-150 h-full pr-1"
            x-bind:class="{ 'max-sm:h-fit max-sm:p-4': open, 'max-sm:h-0 max-sm:p-0': !open }">
            <nav>
                <ul id="headerMenu" class="flex gap-6 text-white max-sm:flex max-sm:flex-col">
                    <li @click="open = false" class="font-bold text-lg duration-75 sm:hover:text-primary"><a
                            href="#">Beranda</a></li>
                    <li @click="open = false" class="font-bold text-lg duration-75 sm:hover:text-primary"><a
                            href="#tentang">Tentang</a></li>
                    <li @click="open = false" class="font-bold text-lg duration-75 sm:hover:text-primary"><a
                            href="#berita">Berita</a></li>
                    <li @click="open = false" class="font-bold text-lg duration-75 sm:hover:text-primary"><a
                            href="#kontak">Kontak</a></li>
                </ul>
            </nav>
            <x-button href="{{ route('login') }}" class="w-fit bg-secondary">
                Login
            </x-button>
        </div>
        <div id="openMenuMobileIcon" class="flex sm:hidden fill-white">
            <box-icon x-show="!open" @click="open = true" class="size-10" name='menu-alt-right'></box-icon>
            <box-icon x-show="open" @click="open = false" name='x' class="size-10"></box-icon>
        </div>
    </div>
</header>

<script>
    const header = document.getElementById('header');
    const headerTitle = document.getElementById('headerTitle');
    const headerMenu = document.getElementById('headerMenu');

    const openMenuMobileIcon = document.getElementById('openMenuMobileIcon');

    window.addEventListener('scroll', () => {
        const value = window.scrollY;
        if (value >= 50) {
            header.classList.add("bg-white", "border-gray-100");
            headerTitle.classList.add("!text-primary");
            headerMenu.classList.add("sm:!text-black");
            openMenuMobileIcon.classList.add('!fill-black')
        } else {
            header.classList.remove("bg-white", "border-gray-100");
            headerTitle.classList.remove("!text-primary");
            headerMenu.classList.remove("sm:!text-black");
            openMenuMobileIcon.classList.remove('!fill-black')
        }
    })
</script>
