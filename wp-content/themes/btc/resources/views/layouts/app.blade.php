<div class="flex flex-col min-h-screen">

  <a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
  </a>

  @include('partials.header')

    <main id="main" class="md:w-full md:max-w-6xl md:mx-auto prose main py-8 px-4">
      @yield('content')
    </main>

    @hasSection('sidebar')
      <aside class="sidebar">
        @yield('sidebar')
      </aside>
    @endif

  @include('partials.footer')
</div>
