@extends('layouts.app')
<?php $checkMark = get_svg('svg.circle-check', 'text-emeraldCity-500 w-6 h-6 mr-4 flex-shrink-0'); ?>
@section('content')
    <div class="bg-gradient-to-br from-goldRush-50 to-goldRush-100 py-12 px-4">
        <div class="mx-auto sm:w-full sm:max-w-3xl md:px-0 first-line">
            <h2 class="text-goldRush-700 mt-0 text-3xl">Landlord Loan Program</h2>
            <p class="text-xl text-goldRush-900 mb-0">Ideal for investors and builders who are seeking leverage to buy a
                turn-key rental property or to refinance and pull out cash from a completed buy-and-hold investment
                property.</p>
        </div>
    </div>
    <div class="standard-content">
        <h2>A More Efficient Loan Approval Process</h2>
        <p>When you choose direct lender Builders Trust Capital, you get a fast, straightforward, and transparent process.
        </p>
        <ul>
            <li>Minimal, simple forms so you can pre-qualify quickly</li>
            <li>All fees disclosed upfront to help you budget projects accurately</li>
            <li>Receive a complimentary profit assessment using Builders Trust </li>
            <li>Capital proprietary calculator and ROI coaching on your investment property</li>
            <li>Get landlord loans funded in as little as 20 business days</li>
        </ul>

    </div>

    <div class="pricing-background bg-none sm:block sm:bg-gradient-to-tl sm:from-bigWaves-800 sm:to-bigWaves-600 w-full">
        <div class="mx-auto px-4 sm:w-full sm:max-w-4xl sm:py-20 sm:px-0">
            <h2 class="text-left m-0 sm:px-0 sm:text-center sm:text-5xl sm:text-bigWaves-50">30-Year DSCR Landlord Loan
                Program</h2>
        </div>
    </div>
    <div class="mx-auto flex sm:max-w-3xl justify-center py-8 px-4">
        <div
            class="rounded-lg overflow-hidden bg-white sm:bg-quicksilver-25 border-4 border-bigWaves-300 shadow sm:shadow-lg hover:shadow-xl transition delay-150 duration-300">
            <figure class="mb-0 mt-8">
                <table>
                    <tbody>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                80% max LTV no cash-out refinances and purchases
                            </td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                75% max LTV cash-out refinances</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                Rates as low as 4.75%</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-lg flex text-quicksilver-600 content-center">
                                <?php echo $checkMark; ?>
                                Points as low as 2% </td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 mb-8 text-lg flex text-quicksilver-600 content-center">
                                <?php echo $checkMark; ?>
                                Credit as low as 650</td>
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
        class="mx-auto pt-12 px-4 sm:px-0 md:px-4 sm:max-w-xl sm:w-full grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-3 md:max-w-6xl">
        <div>
            <h2>Succeed in Your Next Real Estate Deal</h2>
            <p>The team at Builders Trust Capital is focused on building a long-term relationship with you. Continuing to
                partner with us has its advantages. We leverage our knowledge of your business, project, and financials to
                help serve you better. </p>
        </div>
        <div class="md:col-span-2">
            <h3>Speed &amp; Approval</h3>
            <ul>
                <li>Once your project is complete, get access to competitive permanent financing through our network of
                    capital providers</li>
                <li>Existing clients enjoy a faster application process</li>
                <li>Obtain a loan that fits your needs </li>
                <li>No extra requirements
                    <ul>
                        <li>Tax Returns – <em>not required</em></li>
                        <li>DTI Calculations or Income Qualification – <em>not required</em></li>
                        <li>Seasoning of Funds – <em>not required</em></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="standard-content">
        <h3>Flexibility</h3>
        <ul>
            <li>Offer <em>interest only</em> options to suit your funding needs</li>
            <li>Offer 5/1 ARMS, 7/1 ARMs, 10/1 ARMS, and 30-year loans without balloonsy</li>
            <li>Flexible options for seasoning requirements</li>
        </ul>
    </div>

@endsection
