<?php $btcHome = get_svg(
'svg.btc-pattern-3',
'hidden lg:block absolute text-bigWaves-700 fill-current z-0 transform-gpu origin-center
opacity-50 lg:h-full lg:top-0 lg:-translate-x-1/2',
); ?>
<?php $map = get_svg(
'svg.map-location-dot',
'hidden lg:block absolute text-bigWaves-700 fill-current z-0 transform-gpu origin-center
opacity-50 lg:h-screen lg:top-10 lg:translate-x-1/2',
); ?>
@extends('layouts.app')

@section('content')
    <div
        class="flex bg-gradient-to-br from-bigWaves-700 to-bigWaves-900 min-h-screen py-24 px-4 relative overflow-hidden text-quicksilver-25">
        <?php echo $btcHome; ?>
        <div class="flex flex-col justify-center items-center max-w-7xl mx-auto w-full relative z-10">
            <div>
                <h1 class="text-5xl leading-tight sm:leading-snug sm:text-7xl font-extrabold text-goldRush-50">
                    Get capital funding, scale your real estate investment faster
                </h1>
            </div>
            <div class="mx-auto lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-12">
                <div>
                    <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-8">
                      <h2
                      class="text-3xl leading-snug sm:leading-tight sm:text-4xl font-extrabold text-bigWaves-50 mt-0 mb-8">
                      Do more deals
                    </h2>
                    <p class="text-xl sm:text-2xl my-0">As a real estate investor, access to reliable funding quickly
                      ensures you
                      won’t
                      miss out on an
                      opportunity. When you work with the pros at direct Builders Trust Capital, your real estate
                      investing can grow into a scalable profitable business. You have the leverage to reach your
                      business
                      dreams on your timetable.</p>
                    </div>
                </div>
                <div class="quick-contact mx-12">
                    <?php gravity_form(1, false, false, false, '', true, 12); ?>
                </div>
            </div>
        </div>
    </div>
    {{-- Section --}}
    <div
        class="flex bg-gradient-to-br from-bigWaves-900 to-bigWaves-700 min-h-80 py-24 px-4 relative overflow-hidden text-quicksilver-25">
        <?php echo $map; ?>
        <div class="flex flex-col justify-center items-center max-w-7xl mx-auto relative z-10">
            <div class="w-full">
                <h2 class="text-4xl leading-tight sm:leading-snug sm:text-5xl font-extrabold text-goldRush-50">
                    Your Local Direct Lender
                </h2>
            </div>
            <div class="mx-auto lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-12">
                <div>
                  <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-8">
                    <p class="text-xl sm:text-2xl my-0">Developers and builders of single family, multi-family, and mixed-use properties come to Builders Trust Capital for B2B mortgage loans and services. The loans are underwritten and funded in-house through Builders Trust Capital private equity fund. </p>
                  </div>
                </div>
                <div>
                  <div class="sm:p-8 sm:bg-bigWaves-900 sm:bg-opacity-70 rounded-lg mb-8">
                    <p class="text-xl sm:text-2xl my-0">We’re hard money lenders serving investments in New Jersey, Pennsylvania and Delaware <a href="/about" class="text-bigWaves-50 hover:text-bigWaves-100 active:text-bigWaves-100">Learn more about Builders Trust Capital</a>.</p>
                  </div>
                </div>
            </div>
            <div class="max-w-xl w-full">
              <a href="#" class="btn--pricing-table">Get Funded Now</a>
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
