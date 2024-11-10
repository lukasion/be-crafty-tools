<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
        <title>@yield('title') | Be Crafty</title>
    @else
        <title>Useful Web Development and designing tools | Be Crafty</title>
    @endif

    <meta name="robots" content="index, follow">
    <meta name="author" content="Łukasz Mikulec">

    @hasSection('keywords')
        <meta name="keywords" content="@yield('keywords')">
    @else
        <meta name="keywords"
              content="web development, web design, tools, image color picker, favicon generator, image converter, useful tools online, web tools">
    @endif
    
    @hasSection('description')
        <meta name="description" content="@yield('description')">
    @else
        <meta name="description"
              content="Simple and useful tools for web developers and designers. Convert images, generate favicons, pick colors from images, and more.">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="font-sans antialiased bg-white">
<div class="text-black/50 bg-white">
    <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
         src="{{ Vite::asset('resources/images/background.svg') }}" alt="Background"/>

    <x-header/>

    <div class="pt-20 relative min-h-screen flex flex-col items-center justify-center selection:bg-[#ff2049] selection:text-white">
        <div class="relative w-full max-w-2xl px-2 md:px-6 lg:max-w-7xl">
            <main class="mt-6">
                @hasSection('content')
                    @yield('content')
                @endif
            </main>


            <x-adsense-box class="mt-12"/>

            <footer class="py-16 text-center text-sm text-black">
                <p class="flex justify-center items-center flex-col gap-1 mb-8 text-lg">
                    <span>
                        Tools are free to use. Want to support my work?
                    </span>
                    <a href="https://www.buymeacoffee.com/lukasion" target="_blank" rel="noopener noreferrer"
                       class="font-bold flex gap-1 items-center">
                        Buy me a coffee!
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                  d="M208 80H32a8 8 0 0 0-8 8v48a96.3 96.3 0 0 0 32.54 72H32a8 8 0 0 0 0 16h176a8 8 0 0 0 0-16h-24.54a96.6 96.6 0 0 0 27-40.09A40 40 0 0 0 248 128v-8a40 40 0 0 0-40-40m24 48a24 24 0 0 1-17.2 23a96 96 0 0 0 1.2-15V97.38A24 24 0 0 1 232 120ZM112 56V24a8 8 0 0 1 16 0v32a8 8 0 0 1-16 0m32 0V24a8 8 0 0 1 16 0v32a8 8 0 0 1-16 0m-64 0V24a8 8 0 0 1 16 0v32a8 8 0 0 1-16 0"/>
                        </svg>
                    </a>
                </p>
                <p class="mt-6 text-xs">
                    &copy; {{ date('Y') }} Be Crafty - Useful tools. <br/>All rights reserved | <a
                            href="https://github.com/lukasion">
                        Designed and developed by Łukasz Mikulec
                    </a>
                </p>
            </footer>
        </div>
    </div>
</div>
<script async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8621155773680727"
        crossorigin="anonymous"></script>
</body>
</html>
