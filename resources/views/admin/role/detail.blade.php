@extends('layouts.app')
@section('content')
<div class="row gy-5 g-xl-10">
    <div class="col-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Role Detail</span>
                </h3>
            </div>
            <form action="{{route('admin.role-update-data')}}" method="post" onsubmit="btnUpdateData.disabled=true; btnUpdateData.innerText ='Processing'; return true;">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$role->id}}" required>
            <div class="card-body">
                <div class="form-group py-2">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$role->name}}" required>
                    @error('name')
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
</div>
@endsection