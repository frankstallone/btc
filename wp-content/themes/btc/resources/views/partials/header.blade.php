<header class="banner px-4 py-4 sm:px-6 lg:px-8 flex">
  <a class="brand pr-4" href="{{ home_url('/') }}">
    {{ $siteName }}
  </a>

  <nav class="nav-primary pl-4">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    @endif
  </nav>
</header>
