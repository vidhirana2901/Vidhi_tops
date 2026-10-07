@extends('website.layout.layout')

@section('container')
<div class="py-4 text-white" style="background: linear-gradient(90deg, #0B2545 0%, #06172E 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-1">Frequently Asked Questions</h1>
        <p class="mb-0 text-light">Answers to common customer inquiries regarding supply and billing.</p>
    </div>
</div>

<div class="container my-5 max-w-800">
    <div class="accordion shadow-sm" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#c1">
                    Do you offer official GST invoices for business purchases?
                </button>
            </h2>
            <div id="c1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes. We provide official B2B GST tax invoices for contractor, commercial, and industrial purchases so you can claim Input Tax Credit (ITC).
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#c2">
                    Are the products 100% original with manufacturer warranties?
                </button>
            </h2>
            <div id="c2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    All products sold at Krishna Electricals are sourced directly from authorized company distributors. Full manufacturer warranties apply to all items.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#c3">
                    Do you provide site delivery in Ahmedabad?
                </button>
            </h2>
            <div id="c3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, we arrange local site deliveries for bulk cable rolls, switchgear boxes, and lighting orders across Maninagar and surrounding areas in Ahmedabad.
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection