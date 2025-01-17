@extends('layouts.main')

@php
    $subtitle = trans('messages.auth.email');
@endphp

@section('subtitle', $subtitle)

@section('body')
    <section id="app" class="container-app container-app-standalone">
        <a class="logo" href="{{ route('home') }}">
            <img class="img-fluid"
                 src="{{ mix('images/logo.png') }}"
                 alt="{{ setting('title') }}">
        </a>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-paper-plane"></i>
                    {{ $subtitle }}
                </h5>
            </div>
            <form action="{{ route('password.email') }}" method="post">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group mb-0">
                        <label class="required" for="email">
                            {{ trans('validation.attributes.email') }}
                        </label>
                        <input id="email"
                               class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="{{ trans('validation.attributes.email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">
                        {{ $subtitle }}
                    </button>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-1">
                        {{ trans('messages.auth.already_have') }}
                        <a href="{{ route('login') }}">
                            {{ trans('messages.auth.login') }}
                        </a>
                    </p>
                    <p class="mb-0">
                        {{ trans('messages.auth.dont_have') }}
                        <a href="{{ route('register') }}">
                            {{ trans('messages.auth.register') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('javascripts')
    @include('partials.flash')
@endpush
