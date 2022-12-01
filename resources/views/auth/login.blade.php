@extends('layouts.auth')

@section('content')
<form class="form w-100" action="{{ route('login') }}" method="POST" onsubmit="btnSubmit.disabled=true; btnSubmit.innerText ='Processing'; return true;">
    @csrf
    <div class="card-body">

        <div class="text-start mb-10">
            <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Sign In</h1>
            <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Please sign in with your account to get access to this portal</div>
        </div>

        <div class="fv-row mb-8">
            <input type="text" placeholder="Email" name="email" autocomplete="current-password" class="form-control form-control-solid @error('email') is-invalid @enderror" required/>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="fv-row mb-7">
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control form-control-solid @error('password') is-invalid @enderror" required/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="fv-row mb-7">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        @if (Route::has('password.request'))
            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                <a href="{{ route('password.request') }}" class="link-primary">Forgot Password ?</a>
            </div>
        @endif

        <div class="d-flex flex-stack">
            <button type="submit" class="btn btn-primary me-2 flex-shrink-0" name="btnSubmit">
                <span class="indicator-label" data-kt-translate="sign-in-submit">Sign In</span>
            </button>
        </div>
    </div>
</form>
@endsection
