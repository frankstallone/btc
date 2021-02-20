@hasfield('headline')
<header class="bg-bigWaves-50">
  <div class="mx-auto max-w-3xl px-4 py-12 prose">
    <h1>@field('headline')</h1>
    @hasfield('subheading')
      <h2>@field('subheading')</h2>
    @endfield
  </div>
</header>
@endfield
