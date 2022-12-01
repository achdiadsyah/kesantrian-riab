@extends('layouts.app')

@section('content')

<div class="row gy-5 g-xl-10">
    <div class="col-lg-8 col-xl-8 col-md-6 mb-md-5">
        <div class="card card-flush">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Student Information</span>
                </h3>
            </div>
            <div class="card-body pt-6">
                {{-- @include('student.psb.dashboard.index') --}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xl-4 col-md-6 mb-md-5">
        <div class="card card-flush">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Contact Information</span>
                </h3>
            </div>
            <div class="card-body pt-6">
              
            </div>
        </div>
    </div>
</div>
@endsection
