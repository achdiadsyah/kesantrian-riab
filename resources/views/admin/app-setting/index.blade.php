@extends('layouts.app')

@section('content')
<div class="row gy-5 g-xl-10 align-items-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">App Setting</span>
                </h3>
            </div>
            <form action="">
                @csrf
                <div class="card-body">
                    <div class="row g-5">
                        <div class="col-md-6">
                            <p class="lead">1. App Setting</p>
                            <hr>
                            <div class="form-group mb-3">
                                <label>App Name</label>
                                <input type="text" class="form-control" name="app_name" id="app_name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>App Description</label>
                                <input type="text" class="form-control" name="app_description" id="app_description" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>App Logo</label>
                                <input type="text" class="form-control" name="app_logo" id="app_logo" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>App Version</label>
                                <input type="text" class="form-control" name="app_version" id="app_version" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="lead">2. API Setting</p>
                            <hr>
                            <div class="form-group mb-3">
                                <label></label>
                                <input type="text" class="form-control" name="" id="">
                            </div><div class="form-group mb-3">
                                <label></label>
                                <input type="text" class="form-control" name="" id="">
                            </div><div class="form-group mb-3">
                                <label></label>
                                <input type="text" class="form-control" name="" id="">
                            </div><div class="form-group mb-3">
                                <label></label>
                                <input type="text" class="form-control" name="" id="">
                            </div><div class="form-group mb-3">
                                <label></label>
                                <input type="text" class="form-control" name="" id="">
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <p class="lead">3. School Setting</p>
                            <hr>
                            <div class="form-group mb-3">
                                <label>School Full Name</label>
                                <input type="text" class="form-control" name="school_full_name" id="school_full_name">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Short Name</label>
                                <input type="text" class="form-control" name="school_short_name" id="school_short_name">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Address</label>
                                <input type="text" class="form-control" name="school_address" id="school_address">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Phone Number</label>
                                <input type="number" class="form-control" name="school_phone" id="school_phone">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Mobile Number</label>
                                <input type="number" class="form-control" name="school_mobile" id="school_mobile">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Email</label>
                                <input type="email" class="form-control" name="school_email" id="school_email">
                            </div>
                            <div class="form-group mb-3">
                                <label>School NPSN Code</label>
                                <input type="number" class="form-control" name="school_npsn" id="school_npsn">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Instagram URL</label>
                                <input type="url" class="form-control" name="school_instagram" id="school_instagram">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Facebook URL</label>
                                <input type="url" class="form-control" name="school_facebook" id="school_facebook">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Twitter URL</label>
                                <input type="url" class="form-control" name="school_twitter" id="school_twitter">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Youtube URL</label>
                                <input type="url" class="form-control" name="school_youtube" id="school_youtube">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Website URL</label>
                                <input type="url" class="form-control" name="school_website" id="school_website">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Headmaster</label>
                                <input type="text" class="form-control" name="school_headmaster" id="school_headmaster">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-footer">
                <button class="btn btn-primary btn-sm" type="submit">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection