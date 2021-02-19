<header class="banner space-x-4 py-4 px-4 sm:space-x-6 lg:space-x-8 flex max-w-screen-xl mx-auto">
  <a class="brand" href="{{ home_url('/') }}">
    {{ $siteName }}
  </a>

  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    @endif
  </nav>
</header>
