<header class="gap-2 py-4 md:py-2 lg:grid-cols-3 border-b border-[rgba(255,255,255,0.4)] bg-[rgba(255,255,255,0.7)] fixed top-0 left-0 right-0 z-[200] lg:backdrop-blur">
    <div class="container mx-auto">
        <div class="flex lg:col-start-2 text-xl font-bold justify-between items-center">
            <h4 class="px-2 lg:px-0">
                <a href="{{ route('home') }}">
                    Be Crafty - Useful tools
                </a>
            </h4>

            <button class="js-menu-toggle lg:hidden mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <ul class="js-menu flex flex-col fixed left-0 right-0 p-4 -top-[300px] lg:top-0 bg-white lg:bg-transparent lg:relative lg:flex-row gap-6 [&_a:hover]:text-red-500 [&_a]:transition-color text-base">
                <li><a class="{{ request()->routeIs('home') ? 'text-red-500' : '' }}"
                       href="{{ route('home') }}">Homepage</a></li>
                <li><a class="{{ request()->routeIs('image-picker') ? 'text-red-500' : '' }}"
                       href="{{ route('image-picker') }}">Image Color Picker</a></li>
                <li><a class="{{ request()->routeIs('favicon-generator') ? 'text-red-500' : '' }}"
                       href="{{ route('favicon-generator') }}">Favicon
                        Generator</a></li>
                <li>
                    <a class="{{ request()->routeIs('sitemap-generator') ? 'text-red-500' : '' }}"
                       href="{{ route('sitemap-generator') }}">
                        Sitemap Generator
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<script>
    const menu = document.querySelector('.js-menu');
    const menuToggle = document.querySelector('.js-menu-toggle');

    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('-top-[300px]')
        menu.classList.toggle('top-[61px]')
    });
</script>