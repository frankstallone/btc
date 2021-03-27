@extends('layouts.app')
<?php $checkMark = get_svg('svg.circle-check', 'text-emeraldCity-500 w-6 h-6 mr-4 flex-shrink-0'); ?>
@section('content')
    <div class="bg-gradient-to-br from-goldRush-50 to-goldRush-100 py-12 px-4">
        <div class="mx-auto sm:w-full sm:max-w-xl md:px-0 first-line">
            <h2 class="text-goldRush-700 mt-0 text-3xl">Rehab Loan Programs</h2>
            <p class="text-xl text-goldRush-900 mb-0">Ideal for
                investors looking
                to purchase a property,
                renovate and then
                sell or rent the renovated property for a profit. You can also use the loan for the refinance and rehab when
                you’ve started using cash and need a loan to finish the project. Credit score 720 & up.</p>
        </div>
    </div>
    <div
        class="mx-auto py-12 px-4 sm:px-0 md:px-4 sm:max-w-xl sm:w-full grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-2 md:max-w-6xl">
        <div>
            <h2>Builders Trust Capital is a Direct Lender</h2>
            <p>The team at Builders Trust Capital makes the lending decisions. Your loan is underwritten, funded and
                serviced by
                us. No part of the process is handed off to a third-party vendor. With over _____ [number] of projects
                funded
                since 2015, and 80% repeat clients, you can rely on us to deliver consistently every time.</p>
        </div>
        <div>
            <h2>A More Efficient Loan Approval Process</h2>
            <p>When you choose Builders Trust Capital, you get a fast, straightforward and transparent process.</p>
            <ul>
                <li>Minimal, simple forms so you can quickly pre-qualify</li>
                <li>Absolutely no junk fees</li>
                <li>All fees disclosed upfront to help you budget projects accurately</li>
                <li>Receive a complimentary profit assessment using Builders Trust Capital proprietary calculator and ROI
                    coaching on your investment property</li>
                <li>Get most projects funded within just 10 days</li>
            </ul>
        </div>
    </div>
    <div class="pricing-background bg-none sm:block sm:bg-gradient-to-tl sm:from-bigWaves-800 sm:to-bigWaves-600 w-full">
        <div class="mx-auto px-4 sm:w-full sm:max-w-4xl sm:py-20 sm:px-0">
            <h2 class="text-left m-0 sm:px-0 sm:text-center sm:text-5xl sm:text-bigWaves-50">Fix & Flip Loan
                Programs</h2>
        </div>
    </div>
    <div class="mx-auto grid grid-cols-1 gap-4 xl:gap-8 py-8 px-4 sm:grid-cols-2 sm:max-w-6xl xl:px-0">
        <div
            class="rounded-lg overflow-hidden bg-white sm:bg-quicksilver-25 shadow sm:shadow-xl border-4 border-bigWaves-300">
            <div class="px-8 py-8 sm:pb-0 bg-gradient-to-tr from-bigWaves-800 to-bigWaves-600 sm:bg-none">
                <h2 class="mt-0 mb-0 text-bigWaves-50 sm:font-bold sm:text-2xl sm:text-bigWaves-500">
                    Preferred
                </h2>
            </div>
            <figure class="mb-0 mt-8">
                <table>
                    <tbody>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                90% LTC up to 75% LTARV
                            </td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                Rates as low as 9%</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl flex font-semibold content-center">
                                <?php echo $checkMark; ?>
                                Points as low as 2%</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-lg flex text-quicksilver-600 content-center">
                                <?php echo $checkMark; ?>
                                Loans from $75,000 and up</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-lg flex text-quicksilver-600 content-center">
                                <?php echo $checkMark; ?>
                                Interest is escrowed</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 mb-8 text-lg flex text-quicksilver-600 content-center">
                                <?php echo $checkMark; ?>
                                Loan is managed in-house, not outsourced. Ensures consistent service during and after
                                origination</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 pt-0 pb-8">
                                <a href="/application/" class="btn--pricing-table relative"><span
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
        <div
            class="rounded-lg overflow-hidden bg-white sm:bg-quicksilver-25 shadow sm:shadow-xl border-4 border-bigWaves-300">
            <div class="px-8 py-8 sm:pb-0 bg-gradient-to-tr from-bigWaves-800 to-bigWaves-600 sm:bg-none">
                <h2 class="mt-0 mb-0 text-bigWaves-50 sm:font-bold sm:text-2xl sm:text-quicksilver-600">
                    Standard
                </h2>
            </div>
            <figure class="mb-0 mt-8">
                <table>
                    <tbody>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl font-semibold flex content-center">
                                <?php echo $checkMark; ?>
                                85% LTC up to 75% LTARV</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl font-semibold flex content-center">
                                <?php echo $checkMark; ?>
                                Rates as low as 10%</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-xl font-semibold flex content-center">
                                <?php echo $checkMark; ?>
                                Points as low as 2%</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-lg flex text-quicksilver-600 content-center">
                                <?php echo $checkMark; ?>
                                Loans from $75,000 and up</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 text-lg flex text-quicksilver-600 content-center">
                                <?php echo $checkMark; ?>
                                Interest is escrowed</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 py-2 mb-8 text-lg flex text-quicksilver-600 content-center">
                                <?php echo $checkMark; ?>
                                Loan is managed in-house, not outsourced.
                                Ensures consistent service during and after origination</td>
                        </tr>
                        <tr class="border-0">
                            <td class="px-8 pt-0 pb-8">
                                <a href="/application/" class="btn--pricing-table">Get Funded Now</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </figure>
        </div>
    </div>
    <div
        class="mx-auto py-12 px-4 sm:px-0 md:px-4 sm:max-w-xl sm:w-full grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-2 md:max-w-6xl">
        <h2 class="md:col-span-2">Succeed in Your Next Real Estate Deal</h2>
        <div>
            <h3>Speed &amp; Approval</h3>
            <ul>
                <li>Once your appraisal is ordered, you can typically close within 21 business
                    days</li>
                <li>Streamlined loan approval because we handle every step in-house</li>
                <li>No extra requirements
                    <ul>
                        <li>Tax Returns or 4506 Requirements - <em>not required</em></li>
                        <li>DTI Calculations or Income Qualification – <em>not required</em></li>
                        <li>Sourcing or Seasoning of Funds – <em>not required</em></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div>
            <h3>Flexibility</h3>
            <ul>
                <li>Offer a full 100% financial option for qualified borrowers</li>
                <li>Interest is escrowed to simplify payments</li>
                <li>Can fund a portion of the property purchase price (typically 80-85%) and up to 100% of the construction
                    (including soft costs)</li>
                <li>Customize pre-payment structures to fit your business needs</li>
                <li>No limit on number of properties</li>
            </ul>
        </div>
        {{-- No longer using content from the post --}}
        {{-- @while (have_posts()) @php(the_post())
            @includeFirst(['partials.content-page', 'partials.content'])
        @endwhile --}}
    </div>

@endsection
