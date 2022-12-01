@extends('layouts.auth')

@section('content')
<form class="form w-100" action="{{ route('verification.resend') }}" method="POST" onsubmit="btnSubmit.disabled=true; btnSubmit.innerText ='Processing'; return true;">
    @csrf
    <div class="card-body">

        <div class="text-start mb-10">
            <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Verify your account</h1>
        </div>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        {{ __('Before proceeding, please check your email inbox or spam box for a verification link.') }}
        {{ __('If you did not receive the email') }},

        <div class="d-flex">
            <button type="submit" class="btn btn-primary btn-sm me-2" name="btnSubmit">
                <span class="indicator-label" data-kt-translate="sign-in-submit">Request verification</span>
            </button>
            <a class="btn btn-danger btn-sm me-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Or Logout?
            </a>
        </div>
    </div>
</form>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endsection


