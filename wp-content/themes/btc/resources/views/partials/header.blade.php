<div class="bg-bigWaves-50 py-4">
  <header class="md:w-full md:max-w-6xl md:mx-auto px-4 flex justify-between items-center">
    <a class="brand flex mr-4" href="{{ home_url('/') }}">
      {{ $siteName }}
    </a>

    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      @endif
    </nav>
  </header>
</div>
