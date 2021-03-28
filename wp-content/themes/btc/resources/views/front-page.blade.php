<?php $btcHome = get_svg(
'svg.btc-pattern-3',
'hidden md:block absolute text-bigWaves-700 fill-current z-0 transform-gpu origin-center
opacity-50 md:h-full md:top-0 md:-translate-x-1/2',
); ?>
<?php $map = get_svg(
'svg.map-location-dot',
'hidden md:block absolute text-bigWaves-700 fill-current z-0 transform-gpu origin-center
opacity-50 md:h-screen md:top-10 md:translate-x-1/4 lg:translate-x-1/2',
); ?>
@extends('layouts.app')

@section('content')
    <div
        class="flex bg-gradient-to-br from-bigWaves-700 to-bigWaves-900 min-h-screen py-24 px-4 relative overflow-hidden text-quicksilver-25">
        <?php echo $btcHome; ?>
        <div class="flex flex-col justify-center items-center max-w-7xl mx-auto w-full relative z-10">
            <div>
                <h1
                    class="text-5xl leading-tight bg-clip-text text-transparent bg-gradient-to-br from-goldRush-50 to-goldRush-200 sm:leading-snug sm:text-7xl font-extrabold">
                    Get funded, scale your real estate investments faster
                </h1>
            </div>
            <div class="mx-auto lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-12 text-bigWaves-100">
                <div>
                    <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-12">
                        <h2
                            class="text-3xl leading-snug sm:leading-tight sm:text-4xl font-extrabold text-bigWaves-200 mt-0 mb-8">
                            Do more deals with Builders Trust Capital
                        </h2>
                        <p class="text-xl sm:text-2xl my-0">As a real estate investor, access to reliable funding quickly
                            ensures you won’t miss out on an opportunity. When you work with the team at Builders Trust
                            Capital, your real estate investing can grow into a scalable profitable business. You have the
                            leverage to reach your business dreams on your timetable.</p>
                    </div>
                    <a href="/application/" class="btn mb-12 relative"><span
                            class="flex absolute top-0 right-0 -mt-2 -mr-2 h-5 w-5"> <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-alpenglow-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-5 w-5 bg-alpenglow-500"></span></span>Get
                        Funded
                        Now</a>
                </div>
                <div>
                    <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-12">
                        <h2
                            class="text-3xl leading-snug sm:leading-tight sm:text-4xl font-extrabold text-bigWaves-200 mt-0 mb-8">
                            Grow with a Lender Specialized in Private Real Estate
                        </h2>
                        <p class="text-xl sm:text-2xl my-0">Developers and builders of single family, multi-family, and
                            mixed-use properties come to Builders Trust Capital for B2B mortgage loans and services. As a
                            portfolio lender, the loans are underwritten and funded in-house.
                        </p>
                        <p class="text-xl sm:text-2xl mt-8 mb-0">
                            We’re private real estate lenders serving borrowers in New Jersey, Pennsylvania, Maryland,
                            Virginia, and Washington, DC. <a href="/about/"
                                class="text-bigWaves-100 underline hover:text-goldRush-100 hover:no-underline active:no-underline active:text-goldRush-100">Learn
                                more about Builders Trust
                                Capital</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Section --}}
    <div
        class="flex bg-gradient-to-br from-bigWaves-900 to-bigWaves-700 min-h-80 py-24 px-4 relative overflow-hidden text-bigWaves-100">
        <?php echo $map; ?>
        <div class="flex flex-col justify-center items-center max-w-7xl mx-auto relative z-10">
            <div class="w-full">
                <h2 class="text-4xl leading-tight sm:leading-snug sm:text-5xl font-extrabold text-goldRush-50">
                    Grow with a Lender Specialized in Private Real Estate
                </h2>
            </div>
            <div class="mx-auto lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-12">
                <div>
                    <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-12">
                        <p class="text-xl sm:text-2xl my-0">Developers and builders of single family, multi-family, and
                            mixed-use properties come to Builders Trust Capital for B2B mortgage loans and services. As a
                            portfolio lender, the loans are underwritten and funded in-house.
                        </p>
                    </div>
                </div>
                <div>
                    <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-12">
                        <p class="text-xl sm:text-2xl my-0">We’re private real estate lenders serving borrowers in New
                            Jersey, Pennsylvania, Maryland, Virginia, and Washington, DC. <a href="/about"
                                class="text-bigWaves-100 underline hover:text-goldRush-100 hover:no-underline active:no-underline active:text-goldRush-100">Learn
                                more about
                                Builders Trust Capital</a>.</p>
                    </div>
                </div>
            </div>
            <div class="max-w-xl w-full">
                <a href="/application/" class="btn">Get Funded Now</a>
            </div>
        </div>
    </div>
    {{-- Section --}}
    <div
        class="success-stories flex bg-gradient-to-br from-bigWaves-800 to-bigWaves-900 text-quicksilver-25 py-24 px-4 min-h-80 relative overflow-hidden">
        <div class="flex flex-col justify-center lg:max-w-7xl mx-auto w-full z-10">
            <div class="lg:max-w-7xl sm:px-0 relative">
                <h2 class="mt-0 relative z-10 text-3xl text-quicksilver-25">Find Your Loan</h2>
                <p class="relative z-10 text-2xl md:max-w-2xl">
                    Partner with an efficient, personable team who delivers <strong>$000,000</strong> in
                    real estate loans
                </p>
            </div>
            <div
                class="mt-6 grid grid-cols-1 gap-8 text-center xl:gap-12 md:grid-cols-2 md:text-left lg:grid-cols-3 md:px-0">
                <div class="my-0 rounded-lg shadow-xl pt-0 bg-quicksilver-25 overflow-hidden">
                    <h2>Rehabilitation Loan</h2>
                </div>
                <div class="my-0 rounded-lg shadow-xl pt-0 bg-quicksilver-25 overflow-hidden">
                    <h2>Landlord Loans</h2>
                </div>
                <div class="my-0 rounded-lg shadow-xl pt-0 bg-quicksilver-25 overflow-hidden">
                    <h2>Construction Loans</h2>
                </div>

            </div>
        </div>
    </div>
@endsection
