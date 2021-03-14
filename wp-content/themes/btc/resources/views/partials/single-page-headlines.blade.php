    <?php $btcMark = get_svg(
    'svg.btc-mark-one-path',
    'mark absolute text-quicksilver-700 z-0 transform-gpu origin-center
    rotate-12 opacity-50 -inset-full lg:w-96 md:-inset-3/4 lg:left-96 lg:top-0 xl:left-60 xl:top-0',
    ); ?>
    @hasfield('headline')
    <header class="headliners bg-gradient-to-tr from-quicksilver-700 to-quicksilver-800 overflow-hidden relative">
        <?php echo $btcMark; ?>
        <div class="mx-auto max-w-3xl px-4 py-20 relative z-10">
            <h1 class="text-quicksilver-50">@field('headline')</h1>
            @hasfield('subheading')
            <h2 class="text-quicksilver-100">@field('subheading')</h2>
            @endfield
        </div>
    </header>
    @endfield
