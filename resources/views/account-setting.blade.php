@extends('layouts.app')
@section('content')
<div class="row gy-5 g-xl-10">
    @if(auth()->user()->user_level !== "student")
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Account Setting</span>
                </h3>
            </div>
            <form action="{{route('account-setting-update-data')}}" method="post" onsubmit="btnUpdateData.disabled=true; btnUpdateData.innerText ='Processing'; return true;">
            @csrf
            <div class="card-body">
                <div class="form-group py-2">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" required disabled>
                </div>
                <div class="form-group py-2">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group py-2">
                    <label>Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}" required>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn-sm btn btn-primary" name="btnUpdateData">Save Update</button>
            </div>
            </form>
        </div>
    </div>
    @endif
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Users Credential</span>
                </h3>
            </div>
            <form action="{{route('account-setting-update-password')}}" method="post" onsubmit="btnUpdatePassword.disabled=true; btnUpdatePassword.innerText ='Processing'; return true;">
            @csrf
            <div class="card-body">
                <div class="form-group py-2">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" required disabled>
                </div>
                <div class="form-group py-2">
                    <label>New Password</label>
                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group py-2">
                    <label>Confirm Password</label>
                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn-sm btn btn-primary" name="btnUpdatePassword">Save Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection