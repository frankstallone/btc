@extends('layouts.app')

@section('content')
    <div class="standard-content">
        @while (have_posts()) @php(the_post())
            @includeFirst(['partials.content-page', 'partials.content'])
        @endwhile
    </div>
@endsection
