@extends('layouts.app')

@section('content')
    @include('partials.page-header')
    <div class="bg-quicksilver-25 px-6 py-12 sm:px-8">
        <div class="mx-auto grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 md:max-w-6xl">
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
    </div>
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection
