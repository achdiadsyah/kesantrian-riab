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
            <form action="{{route('admin.update-setting')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$app_data->id ? $app_data->id : ''}}">
                <div class="card-body">
                    <div class="row g-5">
                        <div class="col-md-6">
                            <p class="lead">1. App Setting</p>
                            <hr>
                            <div class="form-group mb-3">
                                <label>App Name</label>
                                <input type="text" class="form-control" name="app_name" id="app_name" value="{{$app_data->app_name ? $app_data->app_name : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>App Description</label>
                                <input type="text" class="form-control" name="app_description" id="app_description" value="{{$app_data->app_description ? $app_data->app_description : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>App Version</label>
                                <input type="text" class="form-control" name="app_version" id="app_version" value="{{$app_data->app_version ? $app_data->app_version : ''}}">
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <p class="lead">2. Setting Logo</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="flex-shrink-0">
                                        <img class="" src="{{asset('assets/media/logos/riab-dark.svg')}}" alt="photo">
                                    </div>
                                    <div class="form-group pt-4">
                                        <label>App Logo (Light)</label>
                                        <input type="file" class="form-control" name="app_logo_light" id="app_logo_light">
                                        <p class="form-text text-muted">
                                            Size : 2MB | Type : jpg, jpeg, png, svg
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="flex-shrink-0">
                                        <img class="" src="{{asset('assets/media/logos/riab-dark.svg')}}" alt="photo">
                                    </div>
                                    <div class="form-group pt-4">
                                        <label>App Logo (Dark)</label>
                                        <input type="file" class="form-control" name="app_logo_dark" id="app_logo_dark">
                                        <p class="form-text text-muted">
                                            Size : 2MB | Type : jpg, jpeg, png, svg
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="flex-shrink-0">
                                        <img class="" src="{{asset('assets/media/logos/riab-dark.svg')}}" alt="photo">
                                    </div>
                                    <div class="form-group pt-4">
                                        <label>School Logo (Light)</label>
                                        <input type="file" class="form-control" name="school_logo_light" id="school_logo_light">
                                        <p class="form-text text-muted">
                                            Size : 2MB | Type : jpg, jpeg, png, svg
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="flex-shrink-0">
                                        <img class="" src="{{asset('assets/media/logos/riab-dark.svg')}}" alt="photo">
                                    </div>
                                    <div class="form-group pt-4">
                                        <label>School Logo (Dark)</label>
                                        <input type="file" class="form-control" name="school_logo_dark" id="school_logo_dark">
                                        <p class="form-text text-muted">
                                            Size : 2MB | Type : jpg, jpeg, png, svg
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="lead">3. School Setting</p>
                            <hr>
                            <div class="form-group mb-3">
                                <label>School Full Name</label>
                                <input type="text" class="form-control" name="school_full_name" id="school_full_name" value="{{$app_data->school_full_name ? $app_data->school_full_name : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Short Name</label>
                                <input type="text" class="form-control" name="school_short_name" id="school_short_name" value="{{$app_data->school_short_name ? $app_data->school_short_name : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Address</label>
                                <input type="text" class="form-control" name="school_address" id="school_address" value="{{$app_data->school_address ? $app_data->school_address : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Phone Number</label>
                                <input type="number" class="form-control" name="school_phone" id="school_phone" value="{{$app_data->school_phone ? $app_data->school_phone : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Mobile Number</label>
                                <input type="number" class="form-control" name="school_mobile" id="school_mobile" value="{{$app_data->school_phone ? $app_data->school_phone : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Email</label>
                                <input type="email" class="form-control" name="school_email" id="school_email" value="{{$app_data->school_email ? $app_data->school_email : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School NPSN Code</label>
                                <input type="number" class="form-control" name="school_npsn" id="school_npsn" value="{{$app_data->school_npsn ? $app_data->school_npsn : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Instagram URL</label>
                                <input type="text" class="form-control" name="school_instagram" id="school_instagram" value="{{$app_data->school_instagram ? $app_data->school_instagram : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Facebook URL</label>
                                <input type="text" class="form-control" name="school_facebook" id="school_facebook" value="{{$app_data->school_facebook ? $app_data->school_facebook : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Twitter URL</label>
                                <input type="text" class="form-control" name="school_twitter" id="school_twitter" value="{{$app_data->school_twitter ? $app_data->school_twitter : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Youtube URL</label>
                                <input type="text" class="form-control" name="school_youtube" id="school_youtube" value="{{$app_data->school_youtube ? $app_data->school_youtube : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Website URL</label>
                                <input type="text" class="form-control" name="school_website" id="school_website" value="{{$app_data->school_website ? $app_data->school_website : ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>School Headmaster</label>
                                <input type="text" class="form-control" name="school_headmaster" id="school_headmaster" value="{{$app_data->school_headmaster ? $app_data->school_headmaster : ''}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="lead">4. API Setting</p>
                            <hr>
                            <div class="form-group mb-3">
                                <label>Is Interface Maintenance ?</label>
                                <select name="is_interface_maintenance" id="is_interface_maintenance" class="form-control">
                                    <option value="0" @if($app_data->is_interface_maintenance ==  '0') selected @endif>No</option>
                                    <option value="1" @if($app_data->is_interface_maintenance ==  '1') selected @endif>Yes</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Api Maintenance ?</label>
                                <select name="is_api_maintenance" id="is_api_maintenance" class="form-control">
                                    <option value="0" @if($app_data->is_api_maintenance ==  '0') selected @endif>No</option>
                                    <option value="1" @if($app_data->is_api_maintenance ==  '1') selected @endif}>Yes</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Payment Maintenance ?</label>
                                <select name="is_payment_maintenance" id="is_payment_maintenance" class="form-control">
                                    <option value="0" @if($app_data->is_payment_maintenance ==  '0') selected @endif>No</option>
                                    <option value="1" @if($app_data->is_payment_maintenance ==  '1') selected @endif>Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection