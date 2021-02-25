@hasfield('headline')
<header class="bg-quicksilver-50">
  <div class="mx-auto max-w-3xl px-4 py-20">
    <h1>@field('headline')</h1>
    @hasfield('subheading')
      <h2>@field('subheading')</h2>
    @endfield
  </div>
</header>
@endfield
