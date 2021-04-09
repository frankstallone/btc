@extends('layouts.app')
<?php $checkMark = get_svg('svg.circle-check', 'text-emeraldCity-500 w-6 h-6 mr-4 flex-shrink-0'); ?>
@section('content')
    <div class="bg-gradient-to-br from-goldRush-50 to-goldRush-100 py-12 px-4">
        <div class="mx-auto sm:w-full sm:max-w-3xl md:px-0 first-line">
            <h2 class="text-goldRush-700 mt-0 text-3xl">Rehab Loan Program</h2>
            <p class="text-xl text-goldRush-900 mb-0">Ideal for
                investors looking
                to purchase a property,
                renovate and then
                sell or rent the renovated property for a profit. For borrowers who have already purchased a property and
                are looking to free up cash in the short term or to complete additional renovations, Builders Trust Capital
                also offers a short-term refinance product with construction loans. </p>
        </div>
    </div>
    <div
        class="mx-auto py-12 px-4 sm:px-0 md:px-4 sm:max-w-xl sm:w-full grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-3 md:max-w-6xl">
        <div>
            <h2>Builders Trust Capital is a Direct Lender</h2>
            <p>The team at Builders Trust Capital makes the lending decisions. Your loan is underwritten and funded by us.
                Our principals have funded over _____ projects since 2016 with an approximately 80% repeat client rate, so
                you can rely on us to deliver consistently every time. </p>
        </div>
        <div class="md:col-span-2">
            <h2>A More Efficient Loan Approval Process</h2>
            <p>When you choose Builders Trust Capital, you get a fast, straightforward and transparent process.</p>
            <ul>
                <li>Minimal, simple forms so you can pre-qualify quickly</li>
                <li>Absolutely no junk fees</li>
                <li>All fees disclosed upfront to help you budget projects accurately</li>
                <li>Receive a complimentary profit assessment using Builders Trust Capital's proprietary calculator and ROI
                    coaching on your investment property</li>
                <li>Get most projects funded within just 10 days</li>
            </ul>
        </div>
    </div>
    <div
        class="rehab-pricing-table sm:-mb-96 bg-none sm:block sm:bg-gradient-to-tl sm:from-bigWaves-800 sm:to-bigWaves-600 w-full relative">
        <?php
        $btcPattern = get_svg(
        'svg.btc-pattern-3',
        'hidden sm:block absolute text-bigWaves-700 fill-current z-0 transform-gpu origin-center
        opacity-50 sm:h-full sm:top-0 sm:-translate-x-1/4',
        );
        echo $btcPattern;
        ?>
        <div class="mx-auto px-4 sm:w-full sm:max-w-4xl sm:py-20 sm:px-0 relative z-10">
            <h2 class="text-left m-0 sm:px-0 sm:text-center sm:text-5xl sm:text-bigWaves-50">Renovation Loan Program</h2>
        </div>
    </div>
    <div class="mx-auto flex sm:max-w-3xl justify-center my-8 px-4 relative z-10">
        <div
            class="rounded-lg overflow-hidden bg-white sm:bg-quicksilver-25 border-4 border-bigWaves-300 shadow sm:shadow-lg hover:shadow-xl transition delay-150 duration-300">
            <figure class="mt-8 mr-8 mb-0 ml-8">
                <table>
                    <tbody>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                Up to 90% LTC up to and 75% LTARV <span class="text-alpenglow-500">*</span>
                            </td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                Rates as low as 8%</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                Points as low as 1%</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-lg flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                Loans from $50,000 to $3,000,000</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-lg flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                Interest is built into the loan for your convenience</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-lg flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                We manage the processing and servicing in-house, ensuring consistent service during and
                                after origination </td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 mb-8 text-lg flex content-center">
                                <span class="text-alpenglow-500 mr-1">*</span> <em>highly qualified customers may qualify
                                    for 100% LTC</em>
                            </td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 pt-0 pb-8">
                                <a href="/application/" class="btn relative"><span
                                        class="flex absolute top-0 right-0 -mt-2 -mr-2 h-5 w-5"> <span
                                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-alpenglow-400 opacity-75"></span>
                                        <span
                                            class="relative inline-flex rounded-full h-5 w-5 bg-alpenglow-500"></span></span>Get
                                    Funded Now</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </figure>
        </div>
    </div>
    <div
        class="mx-auto py-12 px-4 sm:px-0 md:px-4 sm:max-w-xl sm:w-full grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-2 md:max-w-6xl">
        <h2 class="md:col-span-2 md:mb-0">Succeed in Your Next Real Estate Deal</h2>
        <div>
            <h3>Speed &amp; Approval</h3>
            <ul>
                <li>Once your appraisal is ordered, you can typically close within 21 business
                    days</li>
                <li>Streamlined loan approval because we handle every step in-house</li>
                <li>No extra requirements
                    <ul>
                        <li>DTI Calculations or Income Qualification – <em>not required</em></li>
                        <li>Seasoning of Funds – <em>not required</em></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div>
            <h3>Flexibility</h3>
            <ul>
                <li>Offer a full 100% loan-to-cost option for qualified borrowers </li>
                <li>Interest is built into the loan to simplify payments, so you can focus solely on the rehab of the
                    property</li>
                <li>Ability to cross collateralize other property to reduce cash to close</li>
                <li>No limit on number of properties</li>
            </ul>
        </div>
    </div>

@endsection
