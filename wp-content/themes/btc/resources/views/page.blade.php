@extends('layouts.app')

@section('content')
  <div class="sm:w-full sm:max-w-3xl mx-auto prose py-8 px-4">
    @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile
  </div>
@endsection
