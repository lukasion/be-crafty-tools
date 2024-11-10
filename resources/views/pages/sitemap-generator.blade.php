@section('title', 'Create a Google Sitemap - Free XML Sitemap Generator Online Tool')
@section('description', 'Free online Google Sitemap Generator for your website. Create an XML sitemap that can be submitted to Google, Bing, and other search engines to help them crawl your website better.')
@section('keywords', 'sitemap, site map, generator, XML, HTML, text, Google, Bing, Yahoo, Ask, MSN, search engines, SEO, webmaster, tools, online, free')

@extends ('layouts.app')

@section ('content')
    <div class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 focus:outline-none md:row-span-3 lg:p-10 lg:pb-10">

        <h1 class="font-bold text-black text-xl">XML Sitemap Generator - enter your website URL to create a
            sitemap</h1>

        <p class="text-center w-full">
            Please enter your <strong>full website URL</strong> and click "START" to generate a sitemap for your
            website. <br/>
            Mind that the tool required a valid URL (e.g. https://example.com or https://<strong>www</strong>.example.com)
            to work
            properly.
        </p>

        <div class="w-full">
            <form action="" method="post"
                  class="flex gap-4 items-center justify-center w-full md:w-1/2 mx-auto">
                @csrf

                <input type="url" name="url" id="url" placeholder="Enter your website URL" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">

                <button type="submit" class="px-8 py-2 bg-blue-500 text-white rounded-lg">START</button>
            </form>

            @if ($errors->has('url'))
                <p class="text-red-500 mt-2 text-center w-full text-sm">{{ $errors->first('url') }}</p>
            @endif

            <p class="mt-2 text-center w-full text-lg font-bold js-result"></p>
        </div>

        <div class="w-full mb-4">
            <x-adsense-box/>
        </div>

        <div class="flex flex-col lg:flex-row gap-4">
            <div class="w-full lg:w-1/2">
                <h2 class="font-semibold mb-4">
                    Free Online Google Sitemap Generator
                </h2>
                <p class="mb-4">
                    Ideal for quickly generating a sitemap for smaller websites (up to 500 pages). No registration
                    is
                    needed,
                    and your sitemap is generated instantly.
                </p>
                <p class="mb-4">
                    You can download the XML sitemap file or have it sent to your email to easily add it to your
                    website.
                </p>
                <p>
                    You're currently on the home page of the online generator. Simply enter your website URL in the
                    form
                    above
                    and click "START" to begin!
                </p>
            </div>
            <div class="w-full lg:w-1/2">
                <h3 class="font-bold mb-4">What is Sitemap?</h3>
                <p>
                    A sitemap is a file where you provide information about the pages, videos, and other files on
                    your
                    site, and the relationships between them. Search engines like Google read this file to more
                    intelligently crawl your site.
                </p>
                <br/>
                <p>
                    A sitemap tells search engines which pages and files you think are important in your site, and
                    also
                    provides valuable information about these files: for example, for pages, when the page was last
                    updated, how often the page is changed, and any alternate language versions of a page.
                </p>
            </div>
        </div>

        <h3 class="text-center font-bold text-xl text-black w-full mt-10 mb-4">
            User Reviews about our Sitemap Generator:
        </h3>

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white border p-4 rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">
                <img src="{{ Vite::asset('resources/images/people/melinda.jpg') }}" alt="Melinda Cooper"
                     class="w-20 h-20 rounded-full mx-auto mb-4">
                <p class="text-black text-lg font-bold mb-4 text-center">Melinda Cooper</p>
                <p class="text-base text-center">
                    "I've been using this tool for a while now, and it's been a great help. I can easily generate
                    sitemaps for my websites and submit them to Google. It's a great tool for webmasters!"
                </p>
                <div class="flex justify-center">
                    @foreach (range(1, 5) as $i)
                        <x-icons.star class="w-4 mt-4 text-yellow-500"/>
                    @endforeach
                </div>
            </div>

            <div class="bg-white border p-4 rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">
                <img src="{{ Vite::asset('resources/images/people/george.jpeg') }}" alt="George Womble"
                     class="w-20 h-20 rounded-full mx-auto mb-4">
                <p class="text-black text-lg font-bold mb-4 text-center">George Womble</p>
                <p class="text-base  text-center">
                    "The sitemap generator is a great tool for webmasters. It's easy to use and generates sitemaps in
                    seconds. I've been using it for a while now and have had no issues with it. Highly recommended!"
                </p>
                <div class="flex justify-center">
                    @foreach (range(1, 5) as $i)
                        <x-icons.star class="w-4 mt-4 text-yellow-500"/>
                    @endforeach
                </div>
            </div>

            <div class="bg-white border p-4 rounded-lg shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)]">
                <img src="{{ Vite::asset('resources/images/people/abraham.jpeg') }}" alt="Abraham Neel"
                     class="w-20 h-20 rounded-full mx-auto mb-4">
                <p class="text-black text-lg font-bold mb-4 text-center">Abraham Neel</p>
                <p class="text-base text-center">
                    "One of the best sitemap generators I've used. It's fast, easy to use, and generates sitemaps in
                    seconds. If I can use it, anyone can! Thanks for creating such a great tool!"
                </p>
                <div class="flex justify-center">
                    @foreach (range(1, 5) as $i)
                        <x-icons.star class="w-4 mt-4 text-yellow-500"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.querySelector('form');
        const result = document.querySelector('.js-result');

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            let i = 0;
            const interval = setInterval(() => {
                i++;
                result.innerText = 'Generating sitemap' + '.'.repeat(i) + ' Please wait...';
                if (i === 3) {
                    i = 0;
                }
            }, 500);

            fetch('/api/sitemap-generator', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    url: document.querySelector('#url').value
                })
            })
                .then(data => {
                    if (data.status === 200) {
                        data.text().then(xml => {
                            const blob = new Blob([xml], {type: 'application/xml'});
                            const url = window.URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.style.display = 'none';
                            a.href = url;
                            a.download = 'sitemap.xml';
                            document.body.appendChild(a);
                            a.click();
                            window.URL.revokeObjectURL(url);

                            clearInterval(interval);
                            result.innerText = 'Sitemap generated successfully. Downloading...';
                        })
                    } else {
                        clearInterval(interval);
                        result.innerText = 'An error occurred while generating the sitemap. Please try again.';
                    }
                })
                .catch((error) => {
                    clearInterval(interval);
                    result.innerText = 'An error occurred while generating the sitemap. Please try again.';
                });
        });
    </script>
@endsection