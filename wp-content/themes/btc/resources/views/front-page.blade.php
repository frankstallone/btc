<?php $btcHome = get_svg(
'svg.btc-pattern-3',
'btc-pattern-hero hidden sm:block absolute text-bigWaves-700 fill-current z-0 transform-gpu origin-center
opacity-50 sm:h-full sm:top-0 sm:-translate-x-1/2',
); ?>
<?php $map = get_svg(
'svg.map-location-dot',
'hidden sm:block absolute text-bigWaves-700 fill-current z-0 transform-gpu origin-center
opacity-50 sm:h-screen sm:top-10 sm:translate-x-1/4',
); ?>
<?php $magnifying = get_svg(
'svg.magnifying-glass-dollar',
'hidden sm:block absolute text-bigWaves-800 fill-current z-0 transform-gpu origin-center
opacity-50 sm:h-screen sm:top-0 sm:-translate-x-1/4',
); ?>
@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen py-24 px-4 relative overflow-hidden text-quicksilver-25">
        {{-- Testing this photo from Adobe Stock series: https://stock.adobe.com/images/3d-render-of-living-room-in-construction-process-with-layered-scheme-of-walls-and-floor-3d-illustration/419835994 --}}
        {{-- More @ https://stock.adobe.com/search?filters%5Bcontent_type%3Aphoto%5D=1&filters%5Bcontent_type%3Aillustration%5D=1&filters%5Bcontent_type%3Azip_vector%5D=1&filters%5Bcontent_type%3Avideo%5D=1&filters%5Bcontent_type%3Atemplate%5D=1&filters%5Bcontent_type%3A3d%5D=1&filters%5Binclude_stock_enterprise%5D=0&filters%5Bis_editorial%5D=0&filters%5Bfree_collection%5D=0&order=relevance&serie_id=419835859 --}}
        <div class="absolute inset-0">
            {{-- <img class="w-full h-full object-cover my-0" src="/wp-content/themes/btc/public/images/test-photo.jpg" alt="" /> --}}
            <picture>
                <source class="w-full h-full object-cover my-0" width="1000px" height="556px"
                    srcset="/wp-content/themes/btc/public/images/test-photo.webp" type="image/webp" />
                <img class="w-full h-full object-cover my-0" width="1000px" height="556px"
                    src="/wp-content/themes/btc/public/images/test-photo.jpg"
                    alt="Photograph: 3d render of living room in construction process with layered scheme of walls and floor 3d illustration" />
            </picture>
            <div class="absolute inset-0 bg-gradient-to-br from-bigWaves-900 to-bigWaves-700"
                style="mix-blend-mode: multiply" aria-hidden="true"></div>
        </div>
        <div class="flex flex-col justify-center items-center max-w-7xl mx-auto w-full relative z-10">
            <div>
                <h1 class="hero text-5xl leading-tight text-goldRush-100 sm:leading-snug sm:text-7xl font-extrabold">
                    Get funded, scale your real estate investments faster
                </h1>
            </div>
            <div class="mx-auto lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-12 text-bigWaves-100">
                <div>
                    <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-12">
                        <h2
                            class="custom-underline relative text-3xl leading-snug sm:leading-tight sm:text-4xl font-extrabold text-bigWaves-200 mt-0 mb-8">
                            Do more deals with Builders Trust Capital
                        </h2>
                        <p class="text-xl sm:text-2xl my-0">As a real estate investor, access to reliable funding
                            quickly
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
                            class="custom-underline relative text-3xl leading-snug sm:leading-tight sm:text-4xl font-extrabold text-bigWaves-200 mt-0 mb-8">
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
        class="css-content-visibility flex bg-gradient-to-br from-bigWaves-900 to-bigWaves-700 min-h-80 py-24 px-4 relative overflow-hidden text-bigWaves-100">
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
        class="css-content-visibility flex bg-gradient-to-br from-bigWaves-700 to-bigWaves-900 min-h-80 py-24 px-4 relative overflow-hidden text-bigWaves-100">
        <?php echo $magnifying; ?>
        <div class="flex flex-col justify-center lg:max-w-7xl mx-auto w-full z-10">
            <div class="lg:max-w-7xl sm:px-0 relative">
                <div class="flex flex-col justify-center items-center max-w-7xl mx-auto relative z-10">
                    <div class="w-full">
                        <h2 class="text-4xl leading-tight sm:leading-snug sm:text-5xl font-extrabold text-goldRush-50">
                            Find Your Loan
                        </h2>
                    </div>
                    <div class="mx-auto lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-12">
                        <div>
                            <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-12">
                                <p class="text-xl sm:text-2xl my-0">Loan programs customized to your specific needs whether
                                    you’re an experienced or first-time real estate investor. Focused on speed, flexibility,
                                    and customer satisfaction. Learn more:</p>
                            </div>
                        </div>
                        <div
                            class="mx-auto flex flex-col justify-center text-center md:text-left space-y-4 lg:space-y-8 w-full max-w-xl">
                            <div class="flex-1">
                                <a href="/rehab-loans/" class="btn">Rehabilitation Loans</a>
                            </div>
                            <div class="flex-1">
                                <a href="/landlord-loans/" class="btn">Landlord Loans</a>
                            </div>
                            <div class="flex-1">
                                <a href="/construction-loans/" class="btn">Construction Loans</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
