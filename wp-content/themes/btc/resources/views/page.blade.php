@extends('layouts.app')

@section('content')
  {{-- Single Page Headline --}}
  @hasfield('headline')
    <h1>@field('headline')</h1>
  @endfield
  @hasfield('subheading')
    <h2>@field('subheading')</h2>
  @endfield
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
@endsection
