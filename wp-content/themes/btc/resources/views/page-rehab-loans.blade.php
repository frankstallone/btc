@extends('layouts.app')

@section('content')
<div class="prose sm:w-full sm:max-w-3xl mx-auto py-8 px-4 mt-8 mb-8 bg-goldRush-50">
  <h3>Rehab Loan Programs</h3>
  <p class="text-xl">Ideal for investors looking to purchase a property, renovate and then sell or rent the renovated property for a profit. You can also use the loan for the refinance and rehab when you’ve started using cash and need a loan to finish the project. Credit score 720 & up.</p>
</div>
<div class="bg-quicksilver-50">
  <div class="prose mx-auto grid grid-cols-1 gap-8 py-8 px-4 md:grid-cols-2 md:max-w-6xl">
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
</div>
{{-- <div class="prose mx-auto grid grid-cols-1 gap-4 py-8 px-4 md:grid-cols-2 md:max-w-5xl">
  <div class="bg-quicksilver-50 p-4">
    <h3>Builders Trust Capital is a Direct Lender</h3>
    <p>The team at Builders Trust Capital makes the lending decisions. Your loan is underwritten, funded and serviced by us. No part of the process is handed off to a third-party vendor. With over _____ {number) of projects funded since 2015, and ________%  repeat clients, you can rely on us to deliver consistently every time.</p>
  </div>
  <div class="bg-quicksilver-50 p-4">
    <h3>A More Efficient Loan Approval Process</h3>
    <p>When you choose Builders Trust Capital, you get a fast, straightforward and transparent process.</p>
    <ul><li>Minimal, simple forms so you can quickly pre-qualify</li><li>Absolutely no junk fees</li><li>All fees disclosed upfront to help you budget projects accurately</li><li>Receive a complimentary profit assessment using Builders Trust Capital proprietary calculator and ROI coaching on your investment property</li><li>Get most projects funded within just 10 days</li></ul>
  </div>
</div> --}}
<div class="prose mx-auto grid grid-cols-1 gap-4 py-8 px-4 md:grid-cols-2 md:max-w-3xl">
  <div>
    <h4>Fix & Flip Preferred Loan Program</h4>
    <figure class="wp-block-table"><table><tbody><tr><td>90% LTC up to 75% LTARV</td></tr><tr><td>Rates as low as 9%</td></tr><tr><td>Points as low as 2%</td></tr><tr><td>Loans from $75,000 and up</td></tr><tr><td>Interest is escrowed</td></tr><tr><td>Loan is managed in-house, not outsourced. Ensures consistent service during and after origination</td></tr></tbody></table></figure>
  </div>
  <div>
    <h4>Fix & Flip Standard Loan Program</h4>
    <figure class="wp-block-table"><table><tbody><tr><td>85% LTC up to 75% LTARV</td></tr><tr><td>Rates as low as 10%</td></tr><tr><td>Points as low as 2%</td></tr><tr><td>Loans from $75,000 and up</td></tr><tr><td>Interest is escrowed</td></tr><tr><td>Loan is managed in-house, not outsourced. Ensures consistent service during and after origination</td></tr></tbody></table></figure>
  </div>
</div>
<div class="prose sm:w-full sm:max-w-3xl mx-auto py-8 px-4">
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
</div>
@endsection
