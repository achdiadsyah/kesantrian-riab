@extends('layouts.app')
@section('content')
<div class="row gy-5 g-xl-10">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Users Detail</span>
                </h3>
            </div>
            <form action="{{route('admin.user-update-data')}}" method="post" onsubmit="btnUpdateData.disabled=true; btnUpdateData.innerText ='Processing'; return true;">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$user->id}}" required>
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
                    <label>User Role</label>
                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id" required>
                        <option value="">Select Role</option>
                        @foreach ($roles as $item)
                        <option value="{{$item->id}}" @if($user->role_id == $item->id) selected @endif>{{$item->name}}</option> 
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group py-2">
                    <label>User Level</label>
                    <select class="form-control @error('user_level') is-invalid @enderror" name="user_level" id="user_level" required>
                        <option value="" @if($user->user_level == "") selected @endif>Select Level</option>
                        <option value="student" @if($user->user_level == "student") selected @endif>Student</option>
                        <option value="staff" @if($user->user_level == "staff") selected @endif>Staff</option>
                        <option value="super" @if($user->user_level == "super") selected @endif>Super Admin</option>
                    </select>
                    @error('user_level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group py-2">
                    <label>User Status</label>
                    <select class="form-control @error('is_active') is-invalid @enderror" name="is_active" id="is_active" required>
                        <option value="" @if($user->is_active == "") selected @endif>Select User Status</option>
                        <option value="1" @if($user->is_active == "1") selected @endif>Active</option>
                        <option value="0" @if($user->is_active == "0") selected @endif>Suspend</option>
                    </select>
                    @error('is_active')
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
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Users Credential</span>
                </h3>
            </div>
            <form action="{{route('admin.user-update-password')}}" method="post" onsubmit="btnUpdatePassword.disabled=true; btnUpdatePassword.innerText ='Processing'; return true;">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$user->id}}" required>
            <div class="card-body">
                <div class="form-group py-2 d-none">
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