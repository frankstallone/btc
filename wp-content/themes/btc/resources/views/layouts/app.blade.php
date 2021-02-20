<div class="flex flex-col min-h-screen">

  <a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
  </a>

  @include('partials.header')
  @include('partials.single-page-headlines')



    <main id="main" class="sm:w-full sm:max-w-3xl sm:mx-auto prose main py-8 px-4">
      @yield('content')
    </main>

  @include('partials.footer')
</div>
