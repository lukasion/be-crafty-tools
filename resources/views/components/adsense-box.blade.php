@props(['class' => ''])

<div class="flex flex-col items-center justify-center min-h-[80px] {{ $class ?? '' }}">
    <p class="text-xs mb-2">
        Ads by Google
    </p>
    <div class="border max-w-[728px] min-h-[80px] w-full">
        <!-- becrafty -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-8621155773680727"
             data-ad-slot="3866208994"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>