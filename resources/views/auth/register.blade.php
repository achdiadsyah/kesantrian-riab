@extends('layouts.auth')

@section('content')
<form class="form w-100" action="{{ route('register') }}" method="POST" onsubmit="btnSubmit.disabled=true; btnSubmit.innerText ='Processing'; return true;">
    @csrf
    <div class="card-body">

        <div class="text-start mb-10">
            <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Sign Up</h1>
            <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Please register your account to get access to this portal</div>
        </div>

        <div class="fv-row mb-8">
            <input type="text" placeholder="Name" name="name" class="form-control form-control-solid @error('name') is-invalid @enderror" required autofocus/>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="fv-row mb-8">
            <input type="text" placeholder="Email" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror" required/>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="fv-row mb-7">
            <input type="password" placeholder="Password" name="password" class="form-control form-control-solid @error('password') is-invalid @enderror" required/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="fv-row mb-7">
            <input type="password" placeholder="Password Confirmation" name="password_confirmation" class="form-control form-control-solid @error('password_confirmation') is-invalid @enderror" required/>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
            <a href="{{ route('login') }}" class="link-primary">I have an account, Let me sign in</a>
        </div>

        <div class="d-flex flex-stack">
            <button type="submit" class="btn btn-primary me-2 flex-shrink-0" name="btnSubmit">
                <span class="indicator-label" data-kt-translate="sign-in-submit">Sign Up</span>
            </button>
        </div>
    </div>
</form>
@endsection

