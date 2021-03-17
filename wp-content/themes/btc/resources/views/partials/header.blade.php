<div class="bg-quicksilver-900 py-4 z-20">
    <header class="sm:w-full sm:max-w-6xl sm:mx-auto px-4 flex justify-between items-center">
        <a class="brand font-display flex mr-4" href="{{ home_url('/') }}">
            <span class="sr-only">
                {{ $siteName }}
            </span>
            <?php
            $btcMark = get_svg('svg.btc-mark-one-path', 'w-6 h-6 text-bigWaves-200 hover:text-goldRush-200');
            echo $btcMark;
            ?>
        </a>
        <span id="nav-mobile-toggle" class="md:hidden">
            {{-- SVG Directive does not work on Panthoen dev server, ref https://github.com/Log1x/sage-svg#blade-directive --}}
            {{-- See here for more details: https://discourse.roots.io/t/sage-10-on-pantheon-a-guide-and-method/19978/5?u=frankstallone --}}

            {{-- @svg('svg.bars', 'w-5') --}}

            {{-- SVG Helper function does work, ref: https://github.com/Log1x/sage-svg#helper --}}

            <?php
            $bars = get_svg('svg.bars', 'w-5 text-bigWaves-200 hover:text-goldRush-200 z-30');
            echo $bars;
            ?>
        </span>

        <nav class="nav-primary">
            @if (has_nav_menu('primary_navigation'))
                <span class="nav-mobile-close absolute top-0 z-40 pt-4 right-0 mr-4 md:hidden">
                    {{-- SVG Directive does not work on Panthoen dev server, ref https://github.com/Log1x/sage-svg#blade-directive --}}
                    {{-- See here for more details: https://discourse.roots.io/t/sage-10-on-pantheon-a-guide-and-method/19978/5?u=frankstallone --}}

                    {{-- @svg('svg.xmark', 'w-5') --}}

                    {{-- SVG Helper function does work, ref: https://github.com/Log1x/sage-svg#helper --}}

                    <?php
                    $xmark = get_svg('svg.xmark', 'w-5 text-goldRush-100');
                    echo $xmark;
                    ?>
                </span>
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            @endif
        </nav>
    </header>
</div>
