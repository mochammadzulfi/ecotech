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

                    {{-- SUCCESS MESSAGE --}}
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- ERROR MESSAGES --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('contact.store', app()->getLocale()) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}"
                                placeholder="{{ __('general.name') }}">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}"
                                placeholder="HP">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control @error('company') is-invalid @enderror"
                                name="company" value="{{ old('company') }}"
                                placeholder="{{ __('general.company') }}">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                name="subject" value="{{ old('subject') }}"
                                placeholder="{{ __('general.subject') }}">
                        </div>

                        <div class="mb-3">
                            <textarea rows="4" class="form-control @error('message') is-invalid @enderror"
                                name="message"
                                placeholder="{{ __('general.message') }}">{{ old('message') }}</textarea>
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