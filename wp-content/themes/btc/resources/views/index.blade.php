@extends('layouts.app')

@section('content')
    <div class="sm:w-full sm:max-w-3xl sm:mx-auto main py-8 px-4">
        @include('partials.page-header')
        @if (!have_posts())
            <x-alert type="warning">
                {!! __('Sorry, no results were found.', 'sage') !!}
            </x-alert>

            {!! get_search_form(false) !!}
        @endif

        @while (have_posts()) @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        @endwhile

        {!! get_the_posts_navigation() !!}
    </div>
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection
