<div class="flex flex-col min-h-screen">

  <a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
  </a>

  @include('partials.header')
  @include('partials.single-page-headlines')

    <main id="main">
      @yield('content')
    </main>

  @include('partials.footer')
</div>
