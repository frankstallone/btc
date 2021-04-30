<div class="bg-quicksilver-900 py-4 z-20">
    <header class="sm:w-full sm:max-w-7xl sm:mx-auto px-4 flex justify-between items-center">
        <a class="brand font-display flex mr-4" href="{{ home_url('/') }}">

            <span class="sr-only">
                {{ $siteName }}
            </span>
            <?php
            $btcMarkHome = get_svg(
            'svg.btc-full-logo-right',
            'w-40 h-8 fill-current text-bigWaves-200
            hover:text-goldRush-200',
            );
            echo $btcMarkHome;
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
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            @endif
        </nav>
        {{-- Mobile navigation based on the footer navigation --}}
        @if (has_nav_menu('footer_navigation'))
            <nav
                class="mobile-navigation mobile-nav--closed w-full flex-col items-center justify-center absolute top-0 bottom-0 left-0 right-0 bg-bigWaves-900 py-10 z-30 hidden">
                <span class="mobile-nav-button--close absolute top-0 z-40 pt-4 right-0 mr-4 md:hidden">
                    <?php
                    $xmark = get_svg('svg.xmark', 'w-5 text-quicksilver-100');
                    echo $xmark;
                    ?>
                </span>
                {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
                <?php
                $btcLogoMobileNav = get_svg('svg.btc-full-logo-centered', 'w-64 fill-current text-bigWaves-800');
                echo $btcLogoMobileNav;
                ?>
            </nav>
        @endif
    </header>
</div>
<div class="bg-emeraldCity-200 py-2 text-emeraldCity-700">
    <section class="sm:w-full sm:max-w-7xl sm:mx-auto px-4">
        ✨ Looking for Ashmore Partners? That's us! New name, same great people. <a href="#"
            class="text-emeraldCity-700 hover:text-emeraldCity-800 hover:no-underline">Read more on our blog</a>.
    </section>
</div>
