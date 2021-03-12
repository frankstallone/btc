@hasfield('headline')
<header class="headliners bg-quicksilver-800 overflow-hidden relative">
    <?php
    $btcMark = get_svg(
    'svg.btc-mark-one-path',
    'mark absolute text-quicksilver-700 z-0 transform-gpu origin-center
    rotate-12 opacity-50 -inset-full md:-inset-3/4 lg:-inset-2/4 xl:-inset-1/4',
    );
    echo $btcMark;
    ?>
    <div class="mx-auto max-w-3xl px-4 py-20 relative z-10">
        <h1 class="text-quicksilver-50">@field('headline')</h1>
        @hasfield('subheading')
        <h2 class="text-quicksilver-100">@field('subheading')</h2>
        @endfield
    </div>
</header>
@endfield
