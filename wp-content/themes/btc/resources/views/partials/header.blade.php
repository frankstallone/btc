<div class="bg-quicksilver-50 py-4">
  <header class="sm:w-full sm:max-w-6xl sm:mx-auto px-4 flex justify-between items-center">
    <a class="brand font-display flex mr-4" href="{{ home_url('/') }}">
      {{ $siteName }}
    </a>
    <span id="nav-mobile-toggle" class="md:hidden">
      {{-- SVG Directive does not work on Panthoen dev server, ref https://github.com/Log1x/sage-svg#blade-directive --}}
      {{-- See here for more details: https://discourse.roots.io/t/sage-10-on-pantheon-a-guide-and-method/19978/5?u=frankstallone --}}

      {{-- @svg('svg.bars', 'w-5') --}}

      {{-- SVG Helper function does work, ref: https://github.com/Log1x/sage-svg#helper  --}}

      <?php $bars = get_svg('svg.bars', 'w-5'); echo $bars ?>
    </span>

    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
      <span class="nav-mobile-close absolute top-0 pt-5 right-0 mr-4 md:hidden">
        {{-- SVG Directive does not work on Panthoen dev server, ref https://github.com/Log1x/sage-svg#blade-directive --}}
        {{-- See here for more details: https://discourse.roots.io/t/sage-10-on-pantheon-a-guide-and-method/19978/5?u=frankstallone --}}

        {{-- @svg('svg.xmark', 'w-5') --}}

        {{-- SVG Helper function does work, ref: https://github.com/Log1x/sage-svg#helper  --}}

        <?php $xmark = get_svg('svg.xmark', 'w-5'); echo $xmark ?>
      </span>
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      @endif
    </nav>
  </header>
</div>
