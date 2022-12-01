@extends('layouts.app')

@section('content')
<div id="kt_app_content_container" class="app-container container-xxl">
   @include('student.psb.biodata.head-biodata')

   <div class="card">
      <form action="@if($psb_data && $psb_data->status_biodata == 1) @else {{route('psb.biodata-asal-sekolah')}} @endif" method="POST" class="form">
            @csrf
            <input type="hidden" value="{{$student->id}}" name="student_id" required>
            <div class="card-header">
               <div class="card-title fs-3 fw-bold">Asal Sekolah</div>
            </div>
            <div class="card-body p-9">
               <div class="row mb-8">
                     <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Nama Sekolah Asal</div>
                     </div>
                     <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid" name="school_name" value="{{$student_old ? $student_old->school_name : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif/>
                        @error('school_name')
                           <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
               </div>
               
               <div class="row mb-8">
                     <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Nomor NPSN</div>
                     </div>
                     <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid" name="school_npsn" value="{{$student_old ? $student_old->school_npsn : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif/>
                        @error('school_npsn')
                           <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
               </div>

               <div class="row mb-8">
                     <div class="col-xl-3">
                        <div class="fs-6 fw-semibold mt-2 mb-3">Alamat Sekolah</div>
                     </div>
                     <div class="col-xl-9 fv-row">
                        <textarea name="school_address" class="form-control form-control-solid h-100px @error('school_address') is-invalid @enderror">{{$student_old ? $student_old->school_address : ''}}</textarea>
                        @error('school_address')
                           <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
               </div>

               <div class="row mb-8">
                  <div class="col-xl-3">
                     <div class="fs-6 fw-semibold mt-2 mb-3">Kategori Sekolah</div>
                  </div>
                  <div class="col-xl-9 fv-row">
                     <select name="school_category" id="" class="form-control form-control-solid" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif>
                        <option value="">--Select School Category--</option> 
                        <option value="SMP Negeri" {{$student_old && $student_old->school_category == "SMP Negeri" ? 'selected' : ''}}>SMP Negeri</option>
                        <option value="SMP Swasta" {{$student_old && $student_old->school_category == "SMP Swasta" ? 'selected' : ''}}>SMP Swasta</option>
                        <option value="SMPIT" {{$student_old && $student_old->school_category == "SMPIT" ? 'selected' : ''}}>SMPIT</option>
                        <option value="MTs Negeri" {{$student_old && $student_old->school_category == "MTs Negeri" ? 'selected' : ''}}>MTs Negeri</option>
                        <option value="MTs Swasta" {{$student_old && $student_old->school_category == "MTs Swasta" ? 'selected' : ''}}>MTs Swasta</option>
                        <option value="Pondok Pesantren" {{$student_old && $student_old->school_category == "Pondok Pesantren" ? 'selected' : ''}}>Pondok Pesantren</option>
                        <option value="Lainnya" {{$student_old && $student_old->school_category == "Lainnya" ? 'selected' : ''}}>Lainnya</option>
                     </select>
                     @error('school_category')
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
               </div>

               <div class="row mb-8">
                  <div class="col-xl-3">
                     <div class="fs-6 fw-semibold mt-2 mb-3">Tahun Lulus</div>
                  </div>
                  <div class="col-xl-9 fv-row">
                     <input type="number" class="form-control form-control-solid" name="graduated_at" id="graduated_at" value="{{$student_old ? $student_old->graduated_at : ''}}" required @if($psb_data && $psb_data->status_biodata == 1) readonly @endif/>
                     @error('graduated_at')
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
    
</div>
@endsection

@push('foot-script')
<script>
   
</script>
@endpush
