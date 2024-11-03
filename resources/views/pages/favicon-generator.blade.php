@section('title', 'Favicon and App icon generator, Free for everyone')
@section ('description', 'The best, free-to-use favicon generator online. Perfect looking icons for all your platforms. Including in Google results pages.')

@extends ('layouts.app')

@section ('content')
    <div
            id="docs-card"
            class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 focus:outline-none md:row-span-3 lg:p-10 lg:pb-10"
    >
        <div class="relative w-full">
            <h1 class="font-bold text-black text-xl mb-2">Favicon Generator</h1>
            <h2 class="font-semibold text-black text-base">Instantly generate a favicon for your website. Download your
                favicon in the most
                up to date
                formats.</h2>
            <p>
                This tool allows you to generate a favicon for your website. You can upload an image or paste a URL to
                an image. The favicon generator will show you the favicon in different sizes and formats.
            </p>
            
            <x-plugin.favicon-generator/>

            <h3 class="mt-8 text-black font-bold">
                The favicon generator will create the files with following sizes:
            </h3>

            <ul class="list-disc list-inside mt-2 pl-4">
                <li>Android Chrome: 96x96, 144x144, 192x192, 256x256, 512x512</li>
                <li>Apple Icon: 180x180, 167x167, 120x120, precomposed, 57x57</li>
                <li>Apple Startup: 640x1136, 750x1334, 1242x2208</li>
                <li>Favicons: 16x16, 32x32, 48x48, 64x64, 128x128, 256x256</li>
                <li>Windows: 70x70, 150x150, 310x310</li>
                <li>Yandex: 50x50</li>
            </ul>

            <p>
                <br/>
                Output of the generation of favicons is a zip file with all the files in it. You can download the zip
                file and extract it to your website's root directory. The favicon will be displayed in the browser's
                tab. It will also be displayed in the bookmarks bar and bookmarks menu.
            </p>
        </div>
    </div>
@endsection