<div class="bg-quicksilver-900 py-4 z-20">
    <header class="sm:w-full sm:max-w-7xl sm:mx-auto px-4 flex justify-between items-center">
        <a class="brand font-display flex mr-4" href="{{ home_url('/') }}">
            <span class="sr-only">
                {{ $siteName }}
            </span>
            <?php
            $btcMark = get_svg('svg.btc-mark-one-path', 'w-6 h-6 text-bigWaves-200 hover:text-goldRush-200');
            echo $btcMark;
            ?>
        </a>
        {{-- Mobile Toggle Button --}}
        <span class="md:hidden mobile-nav-button--open">
            <?php
            $bars = get_svg('svg.bars', 'w-5 text-bigWaves-200 hover:text-goldRush-200 z-30');
            echo $bars;
            ?>
        </span>

        <nav class="nav-primary">
            @if (has_nav_menu('primary_navigation'))
                <span class="mobile-nav-button--close absolute top-0 z-40 pt-4 right-0 mr-4 md:hidden">
                    <?php
                    $xmark = get_svg('svg.xmark', 'w-5 text-goldRush-100');
                    echo $xmark;
                    ?>
                </span>
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            @endif
        </nav>
        {{-- TODO: Create second for the mobile menu without the Loans filler --}}
        @if (has_nav_menu('footer_navigation'))
            <nav class="mobile-navigation mobile-nav--closed hidden">
                {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            </nav>
        @endif
    </header>
</div>
