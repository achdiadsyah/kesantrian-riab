@extends('layouts.app')

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
    @include('student.psb.biodata.head-biodata')

    <div class="card">
        <div class="accordion">
            <div class="accordion-item">    
                <h2 class="accordion-header" id="kt_accordion_1_header_1">
                    <button class="accordion-button fs-4 fw-semibold @if(session('active_tab') == "dad")  @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="@if(session('active_tab') == "dad") true @else false @endif" aria-controls="kt_accordion_1_body_1">
                        Data Ayah
                    </button>
                </h2>
                <div id="kt_accordion_1_body_1" class="accordion-collapse collapse @if(session('active_tab') == "dad") show @endif" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        <form action="@if($psb_data && $psb_data->status_biodata == 1)  @else @if(!$dad) {{route('psb.biodata-orang-tua')}} @endif @endif" method="POST" class="form">
                            @csrf
                            <input type="hidden" value="{{$student->id}}" name="student_id" required>
                            <input type="hidden" value="dad" name="student_relation" required>
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Status</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <select name="is_alive" id="is_alive" class="form-control form-control-solid @error('is_alive') is-invalid @enderror" onchange="changeDadStatus(this);" required @if($psb_data && $psb_data->status_biodata == 1) disabled @endif @if($dad) disabled @endif>
                                        <option value="">-- Select Status -- </option>
                                        <option value="1" @if($dad && $dad->is_alive == '1') selected @endif>Masih</option>
                                        <option value="0" @if($dad && $dad->is_alive == '0') selected @endif>Meninggal</option>
                                    </select>
                                    @error('is_alive')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Nama</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="{{$dad ? $dad->name : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($dad) readonly @endif/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-8" id="row_dad_phone">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Nomor Telepon / WA</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="number" class="form-control form-control-solid @error('phone') is-invalid @enderror" name="phone" id="dad_phone" value="{{$dad ? $dad->phone : ''}}" @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($dad) readonly @endif/>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="row mb-8" id="row_dad_job">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Pekerjaan</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid @error('job') is-invalid @enderror" name="job" id="dad_job" value="{{$dad ? $dad->job : ''}}" @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($dad) readonly @endif/>
                                    @error('job')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        @if($psb_data && $psb_data->status_biodata == 1) 
                                        @else
                                            @if(!$dad)
                                            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes & Next</button>
                                            @else
                                            <button type="button" onclick="btnChangeData('dad')" class="btn btn-danger" id="kt_project_settings_submit">Change Data</button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_2">
                    <button class="accordion-button fs-4 fw-semibold @if(session('active_tab') == "mom")  @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="@if(session('active_tab') == "mom") true @else false @endif" aria-controls="kt_accordion_1_body_2">
                    Data Ibu
                    </button>
                </h2>
                <div id="kt_accordion_1_body_2" class="accordion-collapse collapse @if(session('active_tab') == "mom") show @endif" aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        <form action="@if($psb_data && $psb_data->status_biodata == 1)  @else @if(!$mom) {{route('psb.biodata-orang-tua')}} @endif @endif" method="POST" class="form">
                            @csrf
                            <input type="hidden" value="{{$student->id}}" name="student_id" required>
                            <input type="hidden" value="mom" name="student_relation" required>
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Status</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <select name="is_alive" id="is_alive" class="form-control form-control-solid @error('is_alive') is-invalid @enderror" onchange="changeMomStatus(this);" required @if($psb_data && $psb_data->status_biodata == 1) disabled @endif @if($mom) disabled @endif>
                                        <option value="">-- Select Status -- </option>
                                        <option value="1" @if($mom && $mom->is_alive == '1') selected @endif>Masih</option>
                                        <option value="0" @if($mom && $mom->is_alive == '0') selected @endif>Meninggal</option>
                                    </select>
                                    @error('is_alive')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Nama</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="{{$mom ? $mom->name : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($mom) readonly @endif/>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-8" id="row_mom_phone">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Nomor Telepon / WA</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="number" class="form-control form-control-solid @error('phone') is-invalid @enderror" name="phone" id="mom_phone" value="{{$mom ? $mom->phone : ''}}" @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($mom) readonly @endif/>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="row mb-8" id="row_mom_job">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Pekerjaan</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid @error('job') is-invalid @enderror" name="job" id="mom_job" value="{{$mom ? $mom->job : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($mom) readonly @endif/>
                                    @error('job')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        @if($psb_data && $psb_data->status_biodata == 1) 
                                        @else
                                            @if(!$mom)
                                            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes & Next</button>
                                            @else
                                            <button type="button" onclick="btnChangeData('mom')" class="btn btn-danger" id="kt_project_settings_submit">Change Data</button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_3">
                    <button class="accordion-button fs-4 fw-semibold @if(session('active_tab') == "guardian")  @else collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="@if(session('active_tab') == "guardian") true @else false @endif" aria-controls="kt_accordion_1_body_3">
                    Data Wali
                    </button>
                </h2>
                <div id="kt_accordion_1_body_3" class="accordion-collapse collapse @if(session('active_tab') == "guardian") show @endif" aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        <form action="@if($psb_data && $psb_data->status_biodata == 1)  @else @if(!$guardian) {{route('psb.biodata-orang-tua')}} @endif @endif" method="POST" class="form">
                            @csrf
                            <input type="hidden" value="{{$student->id}}" name="student_id" required>
                            <input type="hidden" value="guardian" name="student_relation" required>
                            
                            <div class="row mb-8 d-none">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Status</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <select name="is_alive" id="is_alive" class="form-control form-control-solid @error('is_alive') is-invalid @enderror" required @if($psb_data && $psb_data->status_biodata == 1) disabled @endif @if($guardian) disabled @endif>
                                        <option value="1" selected>Masih</option>
                                    </select>
                                    @error('is_alive')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Nama</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid @error('name') is-invalid @enderror" name="name" value="{{$guardian ? $guardian->name : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($guardian) readonly @endif/>
                                    @error('name')
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
                                    <input type="number" class="form-control form-control-solid @error('phone') is-invalid @enderror" name="phone" value="{{$guardian ? $guardian->phone : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($guardian) readonly @endif/>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-semibold mt-2 mb-3">Pekerjaan</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text" class="form-control form-control-solid @error('job') is-invalid @enderror" name="job" value="{{$guardian ? $guardian->job : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif @if($guardian) readonly @endif/>
                                    @error('job')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        @if($psb_data && $psb_data->status_biodata == 1) 
                                        @else
                                            @if(!$guardian)
                                            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes & Next</button>
                                            @else
                                            <button type="button" onclick="btnChangeData('guardian')" class="btn btn-danger" id="kt_project_settings_submit">Change Data</button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{route('psb.biodata-orang-tua-delete')}}" method="post" id="formDelete" class="d-none">
    @csrf
    <input type="hidden" value="{{$student->id}}" name="student_id" required>
    <input type="hidden" value="" name="student_relation" id="student_relation_delete" required>
</form>
@endsection

@push('foot-script')
<script>
    function btnChangeData(relation) {
        Swal.fire({
            title: 'Do you want to delete the data?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes Delete',
            }).then((result) => {
            if (result.isConfirmed) {
               $('#student_relation_delete').val(relation);
               $( "#formDelete" ).submit();
            }
        })
    }

    function changeDadStatus(sel) {
        if(sel.value == 1){
            $('#row_dad_phone').removeClass('d-none');
            $('#row_dad_job').removeClass('d-none');
            $('#dad_job').prop('required',true);
            $('#dad_phone').prop('required',true);
        } else {
            $('#row_dad_phone').addClass('d-none');
            $('#row_dad_job').addClass('d-none');
            $('#dad_job').prop('required',false);
            $('#dad_phone').prop('required',false);
            $('#dad_job').val(NULL);
            $('#dad_phone').val(NULL);
        }
    }

    function changeMomStatus(sel) {
        if(sel.value == 1){
            $('#row_mom_phone').removeClass('d-none');
            $('#row_mom_job').removeClass('d-none');
            $('#mom_job').prop('required',true);
            $('#mom_phone').prop('required',true);
        } else {
            $('#row_mom_phone').addClass('d-none');
            $('#row_mom_job').addClass('d-none');
            $('#mom_job').prop('required',false);
            $('#mom_phone').prop('required',false);
            $('#mom_job').val(NULL);
            $('#mom_phone').val(NULL);
        }
    }
</script>
@endpush
