@section('title', 'Image Color Picker online. Color palette generator. HTML, HEX, RGB Picker')
@section('description', 'Image Color Picker tool, pick a color from an image. Extracts color in RGB, HEX. Generate color palette from image you upload. Free to use.')

@extends ('layouts.app')

@section ('content')
    <div
            id="docs-card"
            class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 focus:outline-none md:row-span-3 lg:p-10 lg:pb-10"
    >
        <div class="relative w-full">
            <h1 class="font-bold text-black text-xl mb-2">Image Color Picker</h1>

            <p>
                This tool allows you to pick a color from an image. You can upload an image or paste a URL to an image.
                The color picker will show you the color of the pixel you clicked on. You can also see the color in
                different formats: RGB, HSL, HEX, CMYK, and HSV.
            </p>

            <x-plugin.image-picker/>
        </div>
    </div>
@endsection