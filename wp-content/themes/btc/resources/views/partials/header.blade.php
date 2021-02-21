<div class="bg-quicksilver-50 py-4">
  <header class="sm:w-full sm:max-w-6xl sm:mx-auto px-4 flex justify-between items-center">
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
