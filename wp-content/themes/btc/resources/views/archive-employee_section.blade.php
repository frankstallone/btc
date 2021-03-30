@extends('layouts.app')

@php
$partnerQuery = new WP_Query([
    'post_type' => 'employee_section',
    'posts_per_page' => 25,
    'meta_key' => 'name',
    'order' => 'ASC',
    'orderby' => 'meta_value',
    'tax_query' => [
        [
            'taxonomy' => 'employee',
            'field' => 'slug',
            'terms' => 'partner',
        ],
    ],
]);
$teamQuery = new WP_Query([
    'post_type' => 'employee_section',
    'posts_per_page' => 25,
    'meta_key' => 'name',
    'order' => 'ASC',
    'orderby' => 'meta_value',
    'tax_query' => [
        [
            'taxonomy' => 'employee',
            'field' => 'slug',
            'terms' => 'team',
        ],
    ],
]);
@endphp


@section('content')
    @include('partials.page-header-about')
    <div class="bg-gradient-to-br from-bigWaves-100 to-bigWaves-200 py-12 px-4">
        <div class="mx-auto sm:w-full sm:max-w-3xl md:grid md:grid-cols-2 md:gap-8 first-line">
            <p class="text-xl text-bigWaves-800 mt-0">Builders Trust Capital is a Private Real Estate Lender. We provide
                loans to developers and builders of
                single family, multi-family, and mixed-use properties. As a portfolio lender, the loans are underwritten
                and funded in-house.</p>
            <p class="text-xl text-bigWaves-800 my-0">Builders Trust Capital serves New Jersey, Pennsylvania, Maryland,
                Virginia, and Washington, DC.</p>
        </div>
    </div>
    <div class="bg-quicksilver-25 px-6 py-12 sm:px-8">
        <div class="mx-auto grid grid-cols-1 sm:max-w-xl xl:gap-8 xl:max-w-6xl xl:grid-cols-3">
            <div>
                <h2>We’re focused on building long-term relationships with our clients</h2>
                <ul>
                    <li>Complete in-house lending – no second reviews slowing the process or changing the outcome</li>
                    <li>Big-company capability with small-office personalized service</li>
                    <li>No “junk fees” – we’re transparent and honest</li>
                    <li>Fast loan processing – you get to the closing table on time</li>
                    <li>Fast draw speeds – you have access to construction draws in as little as 24 hours</li>
                    <li>Flexible, custom loan programs to maximize leverage and minimize cash to close</li>
                    <li>Competitive leverage on Loan-to-Cost (LTC) and Loan-to-Value (LTV) </li>
                    <li>Construction expertise – Kurt Schwiedop, Vice President of Construction, earned the 2020 Best
                        Builder / Construction Company in Gloucester County, New Jersey</li>
                    <li>Deep local market knowledge – you work with experts who know your market </li>
                </ul>
            </div>
            <div>
                <h2>We're invested in the business growth of our clients</h2>
                <p>
                    We’re proud of what our clients have accomplished with funding from Builders Trust Capital, and we’re
                    excited to help more people realize their dreams each day.
                </p>

                <a href="/gallery/">See what real estate investors do with Builders Trust Capital</a>

                <p>We handle each step of the process in-house, from pre-qualification to final payment, including payment
                    collection and draws. See our <a href="/rehab-loans/">Renovation Loans</a>, <a
                        href="/landlord-loans/">Rental Loans</a> or <a href="/construction-loans/">New Construction
                        Loans</a>.</p>
            </div>

            <div>
                <h2>The Journey to Builders Trust Capital</h2>
                <p>In August 2021, the Managing Partners of Ashmore Capital LLC, Peter Christiansen and Anthony Susco,
                    collaborated with a long-time lending industry veteran, Jeremiah O’Brien, to establish a new entity with
                    a distinct approach to funding professional builders and developers. </p>
                <p>The pandemic exposed weaknesses in the correspondent model. Good investors had difficulty procuring
                    funding for quality projects due to a temporary shock that significantly curtailed capital availability.
                    This was the genesis of Builders Trust Capital LLC. Peter, Anthony, and Jerry decided to start a
                    portfolio lending company with a novel approach to private real estate lending. </p>
                <p>Builders Trust Capital combines the speed and flexibility of hard money lending with responsible credit
                    and construction risk management practices that enable the company to offer borrowers competitive rates
                    and investors peace of mind. </p>
                <p>Builders Trust Capital helps our customers build sustainable businesses capable of weathering market
                    volatility and protecting their hard-earned assets. Our customers trust us to treat their businesses,
                    their assets, and their money like they were our own as we offer advice and capital for their
                    development projects.</p>
            </div>
        </div>
        <div class="mx-auto sm:w-full sm:max-w-xl my-8 text-center">
            <h2 class="text-3xl">Builders Trust Capital Partners</h2>
        </div>
        <div class="mx-auto grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 md:max-w-6xl">

            @if (!$partnerQuery->have_posts())
                <x-alert type="warning">
                    {!! __('Sorry, no results were found.', 'sage') !!}
                </x-alert>

                {!! get_search_form(false) !!}
            @endif



            @while ($partnerQuery->have_posts()) @php($partnerQuery->the_post())
                @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
            @endwhile

            {!! get_the_posts_navigation() !!}

        </div>
        <div class="mx-auto sm:w-full sm:max-w-xl mb-8 mt-12 text-center">
            <h2 class="text-3xl">Builders Trust Capital Team</h2>
        </div>
        <div class="mx-auto grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 md:max-w-6xl">
            @if (!$teamQuery->have_posts())
                <x-alert type="warning">
                    {!! __('Sorry, no results were found.', 'sage') !!}
                </x-alert>

                {!! get_search_form(false) !!}
            @endif
            @while ($teamQuery->have_posts()) @php($teamQuery->the_post())
                @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
            @endwhile

            {!! get_the_posts_navigation() !!}
        </div>

        <div class="mx-auto sm:w-full sm:max-w-xl my-8">
            <h2 class="text-center">Find out how Builders Trust Capital can help you</h2>
            <p>Everything you need to leverage your capital to grow your business</p>
            <p><a href="/contact/" class="btn">I want to know more </a></p>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection
