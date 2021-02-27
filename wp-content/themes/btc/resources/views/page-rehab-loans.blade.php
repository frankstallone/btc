@extends('layouts.app')

@section('content')
    <div class="bg-goldRush-50">
        <div class="sm:w-full sm:max-w-xl mx-auto py-12 px-4 md:px-0">
            <h3 class="text-goldRush-700 mt-0">Rehab Loan Programs</h3>
            <p class="text-xl text-goldRush-900 mb-0">Ideal for investors looking to purchase a property, renovate and then
                sell or rent the renovated property for a profit. You can also use the loan for the refinance and rehab when
                you’ve started using cash and need a loan to finish the project. Credit score 720 & up.</p>
        </div>
    </div>
    <div class="sm:w-full sm:max-w-xl mx-auto py-8 px-4 mb-4 md:px-0">
        <h3>Builders Trust Capital is a Direct Lender</h3>
        <p>The team at Builders Trust Capital makes the lending decisions. Your loan is underwritten, funded and serviced by
            us. No part of the process is handed off to a third-party vendor. With over _____ {number) of projects funded
            since 2015, and ________% repeat clients, you can rely on us to deliver consistently every time.</p>
        <h3>A More Efficient Loan Approval Process</h3>
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
    {{-- <div class="bg-quicksilver-50">
  <div class="mx-auto grid grid-cols-1 gap-8 py-8 px-4 md:grid-cols-2 md:max-w-6xl">
    <div>
      <h3>Builders Trust Capital is a Direct Lender</h3>
      <p>The team at Builders Trust Capital makes the lending decisions. Your loan is underwritten, funded and serviced by us. No part of the process is handed off to a third-party vendor. With over _____ {number) of projects funded since 2015, and ________%  repeat clients, you can rely on us to deliver consistently every time.</p>
      </div>
      <div>
        <h3>A More Efficient Loan Approval Process</h3>
        <p>When you choose Builders Trust Capital, you get a fast, straightforward and transparent process.</p>
        <ul><li>Minimal, simple forms so you can quickly pre-qualify</li><li>Absolutely no junk fees</li><li>All fees disclosed upfront to help you budget projects accurately</li><li>Receive a complimentary profit assessment using Builders Trust Capital proprietary calculator and ROI coaching on your investment property</li><li>Get most projects funded within just 10 days</li></ul>
      </div>
    </div>
</div> --}}
    {{-- <div class="mx-auto grid grid-cols-1 gap-4 py-12 px-4 md:grid-cols-3 md:grid-rows-2 md:max-w-4xl md:px-0">
  <div class="rounded-xl bg-quicksilver-50 p-4 md:col-span-2">
    <h3>Builders Trust Capital is a Direct Lender</h3>
    <p>The team at Builders Trust Capital makes the lending decisions. Your loan is underwritten, funded and serviced by us. No part of the process is handed off to a third-party vendor. With over _____ {number) of projects funded since 2015, and ________%  repeat clients, you can rely on us to deliver consistently every time.</p>
  </div>
  <div class="rounded-xl bg-quicksilver-50 p-4 md:row-start-2 md:col-span-2 md:col-start-2">
    <h3>A More Efficient Loan Approval Process</h3>
    <p>When you choose Builders Trust Capital, you get a fast, straightforward and transparent process.</p>
    <ul><li>Minimal, simple forms so you can quickly pre-qualify</li><li>Absolutely no junk fees</li><li>All fees disclosed upfront to help you budget projects accurately</li><li>Receive a complimentary profit assessment using Builders Trust Capital proprietary calculator and ROI coaching on your investment property</li><li>Get most projects funded within just 10 days</li></ul>
  </div>
</div> --}}
    <div class="mx-auto grid grid-cols-1 gap-4 py-8 px-4 sm:grid-cols-2 sm:max-w-3xl md:px-0">
        <div class="border-2 rounded-lg border-quicksilver-50 p-8">
            <h2 class="mt-0 mb-0">Fix & Flip Preferred</h2>
            <h3 class="mt-0">Loan Program</h3>
            <figure class="mb-0">
                <table>
                    <tbody>
                        <tr>
                            <td>90% LTC up to 75% LTARV</td>
                        </tr>
                        <tr>
                            <td>Rates as low as 9%</td>
                        </tr>
                        <tr>
                            <td>Points as low as 2%</td>
                        </tr>
                        <tr>
                            <td>Loans from $75,000 and up</td>
                        </tr>
                        <tr>
                            <td>Interest is escrowed</td>
                        </tr>
                        <tr>
                            <td>Loan is managed in-house, not outsourced. Ensures consistent service during and after
                                origination</td>
                        </tr>
                    </tbody>
                </table>
            </figure>
        </div>
        <div class="border-2 rounded-lg border-quicksilver-50 p-8">
            <h2 class="mt-0 mb-0">Fix & Flip Standard</h2>
            <h3 class="mt-0">Loan Program</h3>
            <figure class="mb-0">
                <table>
                    <tbody>
                        <tr>
                            <td>85% LTC up to 75% LTARV</td>
                        </tr>
                        <tr>
                            <td>Rates as low as 10%</td>
                        </tr>
                        <tr>
                            <td>Points as low as 2%</td>
                        </tr>
                        <tr>
                            <td>Loans from $75,000 and up</td>
                        </tr>
                        <tr>
                            <td>Interest is escrowed</td>
                        </tr>
                        <tr>
                            <td>Loan is managed in-house, not outsourced. Ensures consistent service during and after
                                origination</td>
                        </tr>
                    </tbody>
                </table>
            </figure>
        </div>
    </div>
    <div class="standard-content">
        @while (have_posts()) @php(the_post())
            @includeFirst(['partials.content-page', 'partials.content'])
        @endwhile
    </div>
    @include('partials.success-stories')
    @include('partials.how-to')
    @include('partials.testimonials')
@endsection
