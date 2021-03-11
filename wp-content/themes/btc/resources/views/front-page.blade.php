@extends('layouts.app')

@section('content')
    <div class="standard-content">
        <h1>Coming soon...</h1>
        @while (have_posts()) @php(the_post())
            @includeFirst(['partials.content-page', 'partials.content'])
        @endwhile
    </div>
@endsection
