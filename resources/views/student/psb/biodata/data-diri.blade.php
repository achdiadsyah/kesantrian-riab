@extends('layouts.app')

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
   @include('student.psb.biodata.head-biodata')

    <div class="card">
        <form action="@if($psb_data && $psb_data->status_biodata == 1)  @else {{route('psb.biodata-data-diri')}} @endif" method="POST" class="form">
            @csrf
            <input type="hidden" value="{{$student->id}}" name="student_id" required>
            <div class="card-header">
                <div class="card-title fs-3 fw-bold">Data Diri</div>
            </div>
            <div class="card-body p-9">
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Nama Lengkap</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="{{$student->name}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">NIK (Nomor KTP)</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid @error('nik') is-invalid @enderror" name="nik" value="{{$student->nik}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif    />
                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">NISN</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid @error('nisn') is-invalid @enderror" name="nisn" value="{{$student->nisn}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif />
                        @error('nisn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Tempat Lahir</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid @error('place_of_birth') is-invalid @enderror" name="place_of_birth" value="{{$student->place_of_birth}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif   />
                        @error('place_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Tanggal Lahir</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="date" class="form-control form-control-solid @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{$student->date_of_birth}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif  />
                        @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Jenis Kelamin</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <select name="gender" id="gender" class="form-control form-control-solid @error('gender') is-invalid @enderror" required @if($psb_data && $psb_data->status_biodata == 1) disabled @endif />
                            <option value="">-- Select Gender --</option>
                            <option value="male" @if($student->gender == 'male') selected @endif>Laki Laki</option>
                            <option value="female" @if($student->gender == 'female') selected @endif>Perempuan</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Anak Ke</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="number" class="form-control form-control-solid @error('child_order') is-invalid @enderror" placeholder="Ex: 1" name="child_order" value="{{$student->child_order}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif  />
                        @error('child_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Dari total bersaudara</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="number" class="form-control form-control-solid @error('from_child_order') is-invalid @enderror" placeholder="Ex: 3" name="from_child_order" value="{{$student->from_child_order}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif   />
                        @error('from_child_order')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Hobi</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid @error('hobby') is-invalid @enderror" name="hobby" value="{{$student->hobby}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif  />
                        @error('hobby')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Cita-Cita</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid @error('ambition') is-invalid @enderror" name="ambition" value="{{$student->ambition}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif />
                        @error('ambition')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Nomor Telepon / WA</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="number" class="form-control form-control-solid @error('phone') is-invalid @enderror" name="phone" value="{{$student->phone}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif    />
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="card-title fs-3 fw-bold">Data Alamat</div>
            </div>
            <div class="card-body p-9">
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Alamat Rumah</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <textarea name="address" class="form-control form-control-solid h-100px @error('address') is-invalid @enderror" @if($psb_data && $psb_data->status_biodata == 1) readonly @endif>{{$student->address}}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Provinsi</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <select name="province_id" id="province_id" class="form-control form-control-solid @error('province_id') is-invalid @enderror" onchange="getCity(this.value); resetSelected();" required @if($psb_data && $psb_data->status_biodata == 1) disabled @endif   >
                            
                        </select>
                        @error('province_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Kabubaten / Kota</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <select name="city_id" id="city_id" class="form-control form-control-solid @error('city_id') is-invalid @enderror" onchange="getDistrict(this.value)" required @if($psb_data && $psb_data->status_biodata == 1) disabled @endif >

                        </select>
                        @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Kecamatan</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <select name="district_id" id="district_id" class="form-control form-control-solid @error('district_id') is-invalid @enderror" onchange="getVillage(this.value)" required @if($psb_data && $psb_data->status_biodata == 1) disabled @endif  >

                        </select>
                        @error('district_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Desa</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <select name="village_id" id="village_id" class="form-control form-control-solid @error('village_id') is-invalid @enderror" required @if($psb_data && $psb_data->status_biodata == 1) disabled @endif   >

                        </select>
                        @error('village_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-8">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Kode Pos</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="number" class="form-control form-control-solid @error('postal_code') is-invalid @enderror" placeholder="Ex: 23241" name="postal_code" value="{{$student->postal_code}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif  />
                        @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            @if($psb_data && $psb_data->status_biodata == 1) 
            
            @else 
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes & Next</button>
            </div>
            @endif
            </div>
        </form>
    </div>
@endsection

@push('foot-script')
<script>
    var latestProvince = "{{$student->province_id}}";
    var latestCity = "{{$student->city_id}}";
    var latestDistrict = "{{$student->district_id}}";
    var latestVillage = "{{$student->village_id}}";
    $(document).ready(function (){
        getProvince();
    });

    function resetSelected(){
        $('#city_id').html('');
        $('#district_id').html('');
        $('#village_id').html('');
    }

    function getProvince(sel){
        var optionProvince = '';
        
        $.ajax({                                      
            url: "{{route('wilayah.province')}}",              
            type: "get",
            success: function(response) {
                optionProvince += `<option value="">-- Select Province --</option>`
                $.each(response.data, function(i, item) {
                    if(latestProvince == item.id){
                        optionProvince += `<option value="${item.id}" selected>${item.name}</option>`
                        getCity(item.id);
                    } else {
                        optionProvince += `<option value="${item.id}">${item.name}</option>`
                    }
                });
                $('#province_id').html(optionProvince);
            },
        });
    }

    function getCity(id){
        var optionCity = '';
        $.ajax({                                      
            url: "{{route('wilayah.city')}}",              
            type: "get",
            data: {province_id: id },
            success: function(response) {
                optionCity += `<option value="">-- Select City --</option>`
                $.each(response.data, function(i, item) {
                    if(latestCity == item.id){
                        optionCity += `<option value="${item.id}" selected>${item.name}</option>`
                        getDistrict(item.id)
                    } else {
                        optionCity += `<option value="${item.id}">${item.name}</option>`
                    }
                });
                $('#city_id').html(optionCity);
            },
        });
    }

    function getDistrict(id) {
        var optionDistrict = '';
        $.ajax({                                      
            url: "{{route('wilayah.district')}}",              
            type: "get",
            data: {city_id: id },
            success: function(response) {
                optionDistrict += `<option value="">-- Select District --</option>`
                $.each(response.data, function(i, item) {
                    if(latestDistrict == item.id){
                        optionDistrict += `<option value="${item.id}" selected>${item.name}</option>`
                        getVillage(item.id)
                    } else {
                        optionDistrict += `<option value="${item.id}">${item.name}</option>`
                    }
                });
                $('#district_id').html(optionDistrict);
            },
        });
    }

    function getVillage(id){
        var optionVillage = '';
        $.ajax({                                      
            url: "{{route('wilayah.village')}}",              
            type: "get",
            data: {district_id: id },
            success: function(response) {
                optionVillage += `<option value="">-- Select Village --</option>`
                $.each(response.data, function(i, item) {
                    if(latestVillage == item.id){
                        optionVillage += `<option value="${item.id}" selected>${item.name}</option>`
                    } else {
                        optionVillage += `<option value="${item.id}">${item.name}</option>`
                    }
                });
                $('#village_id').html(optionVillage);
            },
        });
    }

</script>
@endpush
