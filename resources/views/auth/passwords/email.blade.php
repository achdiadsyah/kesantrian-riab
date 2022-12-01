@extends('layouts.auth')

@section('content')
<form class="form w-100" action="{{ route('password.email') }}" method="POST" onsubmit="btnSubmit.disabled=true; btnSubmit.innerText ='Processing'; return true;">
    @csrf
    <div class="card-body">

        <div class="text-start mb-10">
            <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Reset Password</h1>
            <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Please enter your email to request a reset link</div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="fv-row mb-8">
            <input type="text" placeholder="Email" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror"  value="{{ old('email') }}" required/>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-flex flex-stack">
            <button type="submit" class="btn btn-primary me-2 flex-shrink-0" name="btnSubmit">
                <span class="indicator-label" data-kt-translate="sign-in-submit">Send Request</span>
            </button>
        </div>
    </div>
</form>
@endsection