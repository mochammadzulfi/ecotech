@extends('layouts.app')

@section('content')

{{-- PAGE HEADER --}}
@include('components.page-header', ['header' => $header])

{{-- CERTIFICATE --}}
@include('components.certificate', ['certificates' => $certificates])

{{-- CONTACT SECTION --}}
<section class="contact-section py-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">

            {{-- MAP --}}
            <div class="col-md-7">
                <div class="contact-map">
                    {!! $contact->map_embed !!}
                </div>
            </div>

            {{-- FORM --}}
            <div class="col-md-5">
                <div class="contact-card">
                    <h4>{{ __('general.contact_us') }}</h4>

                    <form action="#" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="{{ __('general.name') }}">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="HP">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="{{ __('general.company') }}">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="{{ __('general.subject') }}">
                        </div>

                        <div class="mb-3">
                            <textarea rows="4" class="form-control"
                                placeholder="{{ __('general.message') }}"></textarea>
                        </div>

                        <button class="btn btn-primary w-100">
                            {{ __('general.send_message') }}
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- CTA --}}
@include('components.cta', ['cta' => $cta])

@endsection